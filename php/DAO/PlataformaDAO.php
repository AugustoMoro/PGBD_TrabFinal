<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PlataformaDAO
 *
 * @author morov
 */
include_once ("DB.php");
include($_SERVER['DOCUMENT_ROOT']."/PGBD_TrabFinal/php/InterfaceDAO/IPlataformaDAO.php");
include($_SERVER['DOCUMENT_ROOT']."/PGBD_TrabFinal/php/Objects/Plataforma.php");

class PlataformaDAO implements IPlataformaDAO {

    var $db;
    var $connection;
    var $plataforma;

    public function __construct() {
        $this->db = new DB();
        $this->connection = mysqli_connect($this->db->getHost(), $this->db->getUser(), $this->db->getSenha(), $this->db->getBanco());
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
        mysqli_set_charset($this->connection, 'utf8');
        $this->plataforma = array();
    }

    public function getPlataformaByIdJogo($nosql,$idJogo) {
        $this->plataforma = array();
        if($nosql == 0){
            $sql = "select p.idPlataforma,p.nomePlat from jogo j join plataforma p on j.idPlataforma = p.idPlataforma "
                    . "where idJogo = $idJogo";
            $result = $this->connection->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $plat = new Plataforma();
                    $plat->setIdPlataforma($row["idPlataforma"]);
                    $plat->setNomePlat($row["nomePlat"]);
                    array_push($this->plataforma, $plat);
                }
            }
            return $this->plataforma;
        }
        else{
            $mongo = new MongoDB\Driver\Manager("mongodb://localhost:27017");
            $id = new \MongoDB\BSON\ObjectId($idJogo);
            $filter = ["_id" => $id];
            $options = [];
            $query = new MongoDB\Driver\Query($filter, $options);
            $cursor = $mongo->executeQuery('dbgames.games', $query);
            foreach ($cursor as $document) {
                $plat = new Plataforma();
                $plat->setIdPlataforma($document->nomePlat);
                $plat->setNomePlat($document->nomePlat);
                array_push($this->plataforma, $plat);
            }
            return $this->plataforma;
        }
    }


    public function getPlataformaByIdPlat($nosql,$idPlat){
        $this->plataforma = array();
        if($nosql == 0){
            $sql = "select * from plataforma where idPlataforma = $idPlat";
            $result = $this->connection->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $plat = new Plataforma();
                    $plat->setIdPlataforma($row["idPlataforma"]);
                    $plat->setNomePlat($row["nomePlat"]);
                    array_push($this->plataforma, $plat);
                }
            }
            return $this->plataforma;
        }
        else{
            $options = [];
            $filter = ['nomePlat' => $idPlat];
            $query = new MongoDB\Driver\Query($filter, $options);
            $mongo = new MongoDB\Driver\Manager("mongodb://localhost:27017");
            $cursor = $mongo->executeQuery('dbgames.games', $query);
            foreach ($cursor as $document) {
                $plat = new Plataforma();
                $plat->setIdPlataforma($document->nomePlat);
                $plat->setNomePlat($document->nomePlat);
                array_push($this->plataforma, $plat);
            }
            return $this->plataforma;
        }
    }
    
    public function getTotasPlataformas($nosql){
        $this->plataforma = array();
        if($nosql == 0){
            $sql = "select * from plataforma";
            $result = $this->connection->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $plat = new Plataforma();
                    $plat->setIdPlataforma($row["idPlataforma"]);
                    $plat->setNomePlat($row["nomePlat"]);
                    array_push($this->plataforma, $plat);
                }
            }
            return $this->plataforma;
        }
        else{
            $mongo = new MongoDB\Driver\Manager("mongodb://localhost:27017");
            $cmd = new MongoDB\Driver\Command(['distinct' => 'games','key' => 'nomePlat',[]]);
            $cursor = $mongo->executeCommand('dbgames', $cmd);
            $array = current($cursor->toArray())->values;
            for($i=0; $i<count($array); $i++){
                $plat = new Plataforma();
                $plat->setIdPlataforma($array[$i]);
                $plat->setNomePlat($array[$i]);
                array_push($this->plataforma, $plat);
            }
            return $this->plataforma;
        }
    }

}
