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
include ("C:\wamp64\www\PGBD_TrabFinal\php\InterfaceDAO\IEditorDAO.php");
include ("C:\wamp64\www\PGBD_TrabFinal\php\Objects\Editor.php");

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

    public function getEditorByIdJogo($idJogo) {
        $sql = "select e.idEditor,e.editorNome from editor e join jogo j on j.idEditor = e.idEditor where idJogo = $idJogo";
        $result = $this->connection->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $ed = new Editor();
                $ed->setIdEditor($row["idEditor"]);
                $ed->setEditorNome($row["editorNome"]);
                array_push($this->editor, $ed);
            }
        }
        return $this->editor;
    }
    
    public function getEditorByIdEd($idEd){
        $sql = "select * from editor where idEditor = $idEd";
        $result = $this->connection->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $ed = new Editor();
                $ed->setIdEditor($row["idEditor"]);
                $ed->setEditorNome($row["editorNome"]);
                array_push($this->editor, $ed);
            }
        }
        return $this->editor;
    }
    
    public function getTodosEditores(){
        $sql = "select * from editor";
        $result = $this->connection->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $ed = new Editor();
                $ed->setIdEditor($row["idEditor"]);
                $ed->setEditorNome($row["editorNome"]);
                array_push($this->editor, $ed);
            }
        }
        return $this->editor;
    }
    
    public function insertEditor($editorNome){
        $sql = "insert into editor (editorNome) values (\"$editorNome\")";

        if ($this->connection->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $this->connection->error;
        }
    }

}
