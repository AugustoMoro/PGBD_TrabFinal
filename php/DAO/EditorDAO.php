<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EditorDAO
 *
 * @author morov
 */
include_once ("DB.php");
include($_SERVER['DOCUMENT_ROOT']."/PGBD_TrabFinal/php/InterfaceDAO/IEditorDAO.php");
include($_SERVER['DOCUMENT_ROOT']."/PGBD_TrabFinal/php/Objects/Editor.php");

class EditorDAO implements IEditorDAO {

    var $db;
    var $connection;
    var $editor;

    public function __construct() {
        $this->db = new DB();
        $this->connection = mysqli_connect($this->db->getHost(), $this->db->getUser(), $this->db->getSenha(), $this->db->getBanco());
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
        mysqli_set_charset($this->connection, 'utf8');
        $this->editor = array();
    }

    public function getEditorByIdJogo($nosql,$idJogo) {
        $this->editor = array();
        if($nosql == 0){
            $sql = "select e.idEditor,e.editorNome from editor e join jogo j on j.idEditor = e.idEditor where idJogo = $idJogo";
            $result = $this->connection->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $ed = new Editor();
                    $ed->setIdEditor($row["idEditor"]);
                    $ed->setEditorNome($row["editorNome"]);
                    array_push($this->editor, $ed);
                }
            }
            return $this->editor;
        }
        else{
            $mongo = new MongoDB\Driver\Manager("mongodb://localhost:27017");
            $id = new \MongoDB\BSON\ObjectId($idJogo);
            $filter = ["_id" => $id];
            $options = [];
            $query = new MongoDB\Driver\Query($filter, $options);
            $cursor = $mongo->executeQuery('dbgames.games', $query);
            foreach ($cursor as $document) {
                $ed = new Editor();
                $ed->setIdEditor($document->editorNome);
                $ed->setEditorNome($document->editorNome);
                array_push($this->editor, $ed);
            }
            return $this->editor;
        }
    }
    
    public function getEditorByIdEd($nosql,$idEd){
        $this->editor = array();
        if($nosql == 0){
            $sql = "select * from editor where idEditor = $idEd";
            $result = $this->connection->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $ed = new Editor();
                    $ed->setIdEditor($row["idEditor"]);
                    $ed->setEditorNome($row["editorNome"]);
                    array_push($this->editor, $ed);
                }
            }
            return $this->editor;
        }
        else{
            $options = [];
            $filter = [ 'editorNome' => $idEd];
            $query = new MongoDB\Driver\Query($filter, $options);
            $mongo = new MongoDB\Driver\Manager("mongodb://localhost:27017");
            $cursor = $mongo->executeQuery('dbgames.games', $query);
            foreach ($cursor as $document) {
                $ed = new Editor();
                $ed->setIdEditor($document->editorNome);
                $ed->setEditorNome($document->editorNome);
                array_push($this->editor, $ed);
            }
            return $this->editor;
        }
    }
    
    public function getTodosEditores($nosql){
        $this->editor = array();
        if($nosql == 0){
            $sql = "select * from editor";
            $result = $this->connection->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $ed = new Editor();
                    $ed->setIdEditor($row["idEditor"]);
                    $ed->setEditorNome($row["editorNome"]);
                    array_push($this->editor, $ed);
                }
            }
            return $this->editor;
        }
        else{
            $mongo = new MongoDB\Driver\Manager("mongodb://localhost:27017");
            $cmd = new MongoDB\Driver\Command(['distinct' => 'games','key' => 'editorNome',[]]);
            $cursor = $mongo->executeCommand('dbgames', $cmd);
            $array = current($cursor->toArray())->values;
            for($i=0; $i<count($array); $i++){
                $ed = new Editor();
                $ed->setIdEditor($array[$i]);
                $ed->setEditorNome($array[$i]);
                array_push($this->editor, $ed);
            }
            return $this->editor;
        }
    }
}
