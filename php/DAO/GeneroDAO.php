<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GeneroDAO
 *
 * @author morov
 */
include_once ("DB.php");
include($_SERVER['DOCUMENT_ROOT']."/PGBD_TrabFinal/php/InterfaceDAO/IGeneroDAO.php");
include($_SERVER['DOCUMENT_ROOT']."/PGBD_TrabFinal/php/Objects/Genero.php");

class GeneroDAO implements IGeneroDAO {

    var $db;
    var $connection;
    var $genero;

    public function __construct() {
        $this->db = new DB();
        $this->connection = mysqli_connect($this->db->getHost(), $this->db->getUser(), $this->db->getSenha(), $this->db->getBanco());
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
        mysqli_set_charset($this->connection, 'utf8');
        $this->genero = array();
    }

    public function getGeneroByIdJogo($nosql,$idJogo) {
        $this->genero = array();
        if($nosql == 0){
            $sql = "select g.idGenero,generoNome from genero g join jogo j on j.idGenero = g.idGenero where j.idJogo = $idJogo";
            $result = $this->connection->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $gen = new Genero();
                    $gen->setIdGenero($row["idGenero"]);
                    $gen->setGeneroNome($row["generoNome"]);
                    array_push($this->genero, $gen);
                }
            }
            return $this->genero;
        }
        else{
            $mongo = new MongoDB\Driver\Manager("mongodb://localhost:27017");
            $id = new \MongoDB\BSON\ObjectId($idJogo);
            $filter = ["_id" => $id];
            $options = [];
            $query = new MongoDB\Driver\Query($filter, $options);
            $cursor = $mongo->executeQuery('dbgames.games', $query);
            foreach ($cursor as $document) {
                $gen = new Genero();
                $gen->setIdGenero($document->generoNome);
                $gen->setGeneroNome($document->generoNome);
                array_push($this->genero, $gen);
            }
            return $this->genero;
        }
    }

    public function getGeneroGyIdGen($nosql,$idGen) {
        $this->genero = array();
        if($nosql == 0){
            $sql = "select * from genero where idGenero = $idGen";
            $result = $this->connection->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $gen = new Genero();
                    $gen->setIdGenero($row["idGenero"]);
                    $gen->setGeneroNome($row["generoNome"]);
                    array_push($this->genero, $gen);
                }
            }
            return $this->genero;
        }
        else{
            $options = [];
            $filter = [ 'generoNome' => $idGen];
            $query = new MongoDB\Driver\Query($filter, $options);
            $mongo = new MongoDB\Driver\Manager("mongodb://localhost:27017");
            $cursor = $mongo->executeQuery('dbgames.games', $query);
            foreach ($cursor as $document) {
                $gen = new Genero();
                $gen->setIdGenero($document->generoNome);
                $gen->setGeneroNome($document->generoNome);
                array_push($this->genero, $gen);
            }
            return $this->genero;
        }
    }

    public function getTodosGeneros($nosql) {
        $this->genero = array();
        if($nosql == 0){
            $sql = "select * from genero";
            $result = $this->connection->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $gen = new Genero();
                    $gen->setIdGenero($row["idGenero"]);
                    $gen->setGeneroNome($row["generoNome"]);
                    array_push($this->genero, $gen);
                }
            }
            return $this->genero;
        }
        else{
            $mongo = new MongoDB\Driver\Manager("mongodb://localhost:27017");
            $cmd = new MongoDB\Driver\Command(['distinct' => 'games','key' => 'generoNome',[]]);
            $cursor = $mongo->executeCommand('dbgames', $cmd);
            $array = current($cursor->toArray())->values;
            for($i=0; $i<count($array); $i++){
                $gen = new Genero();
                $gen->setIdGenero($array[$i]);
                $gen->setGeneroNome($array[$i]);
                array_push($this->genero, $gen);
            }
            return $this->genero;
        }
    }

}
