<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of JogoDAO
 *
 * @author morov
 */
include_once ("DB.php");

include($_SERVER['DOCUMENT_ROOT']."/PGBD_TrabFinal/php/InterfaceDAO/IJogoDAO.php");
include($_SERVER['DOCUMENT_ROOT']."/PGBD_TrabFinal/php/Objects/Jogo.php");


class JogoDAO implements IJogoDAO {

    var $db;
    var $connection;
    var $jogos;

    public function __construct() {
        $this->db = new DB();
        $this->connection = mysqli_connect($this->db->getHost(), $this->db->getUser(), $this->db->getSenha(), $this->db->getBanco());
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
        mysqli_set_charset($this->connection, 'utf8');
        $this->jogos = array();

    }

    public function getTop100($nosql) {
        $this->jogos = array();
        if($nosql == 0){
            $sql = "select j.* from jogo j join vendas v on j.idJogo = v.idJogo order by (v.vendas_totais) desc";
            $result = $this->connection->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $jogo = new Jogo();
                    $jogo->setIdJogo($row["idJogo"]);
                    $jogo->setNomeJogo($row["jogoNome"]);
                    $jogo->setAnoJogo($row["anoJogo"]);
                    $jogo->setImgLink($row["imgLink"]);
                    $jogo->setIdPlataforma($row["idPlataforma"]);
                    $jogo->setIdGenero($row["idGenero"]);
                    $jogo->setIdEditor($row["idEditor"]);
                    array_push($this->jogos, $jogo);
                }
            }
            return $this->jogos;
        }
        else{
            $filter = [];
            $options = ['sort' => ['vendas_totais' => -1],];
            $query = new MongoDB\Driver\Query($filter, $options);
            $mongo = new MongoDB\Driver\Manager("mongodb://localhost:27017");
            $cursor = $mongo->executeQuery('dbgames.games', $query);
            foreach ($cursor as $document) {
                $jogo = new Jogo();
                $jogo->setIdJogo($document->_id);
                $jogo->setNomeJogo($document->jogoNome);
                $jogo->setAnoJogo($document->anoJogo);
                $jogo->setImgLink($document->imgLink);
                $jogo->setIdPlataforma($document->nomePlat);
                $jogo->setIdGenero($document->generoNome);
                $jogo->setIdEditor($document->editorNome);
                array_push($this->jogos, $jogo);
            }
            return $this->jogos;
        }
    }

    

    public function getJogosByPlataforma($nosql,$plataforma) {
        $this->editor = array();
        if($nosql == 0){
            $sql = "select j.* from jogo j join plataforma p on p.idPlataforma = j.idPlataforma "
                    . "where p.nomePlat = \"$plataforma\"";
            $result = $this->connection->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $jogo = new Jogo();
                    $jogo->setIdJogo($row["idJogo"]);
                    $jogo->setNomeJogo($row["jogoNome"]);
                    $jogo->setAnoJogo($row["anoJogo"]);
                    $jogo->setImgLink($row["imgLink"]);
                    $jogo->setIdPlataforma($row["idPlataforma"]);
                    $jogo->setIdGenero($row["idGenero"]);
                    $jogo->setIdEditor($row["idEditor"]);
                    array_push($this->jogos, $jogo);
                }
            }
            return $this->jogos;
        }
        else{
            $filter = ["nomePlat" => $plataforma];
            $options = [];
            $query = new MongoDB\Driver\Query($filter, $options);
            $mongo = new MongoDB\Driver\Manager("mongodb://localhost:27017");
            $cursor = $mongo->executeQuery('dbgames.games', $query);
            foreach ($cursor as $document) {
                $jogo = new Jogo();
                $jogo->setIdJogo($document->_id);
                $jogo->setNomeJogo($document->jogoNome);
                $jogo->setAnoJogo($document->anoJogo);
                $jogo->setImgLink($document->imgLink);
                $jogo->setIdPlataforma($document->nomePlat);
                $jogo->setIdGenero($document->generoNome);
                $jogo->setIdEditor($document->editorNome);
                array_push($this->jogos, $jogo);
            }
            return $this->jogos;

        }
    }

    public function getJogosByGenero($nosql,$genero) {
        $this->editor = array();
        if($nosql == 0){
            $sql = "select j.* from jogo j join genero g on g.idGenero = j.idGenero "
                    . "where g.generoNome = \"$genero\"";
            $result = $this->connection->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $jogo = new Jogo();
                    $jogo->setIdJogo($row["idJogo"]);
                    $jogo->setNomeJogo($row["jogoNome"]);
                    $jogo->setAnoJogo($row["anoJogo"]);
                    $jogo->setImgLink($row["imgLink"]);
                    $jogo->setIdPlataforma($row["idPlataforma"]);
                    $jogo->setIdGenero($row["idGenero"]);
                    $jogo->setIdEditor($row["idEditor"]);
                    array_push($this->jogos, $jogo);
                }
            }
            return $this->jogos;
        }
        else{
            $filter = ["generoNome" => $genero];
            $options = [];
            $query = new MongoDB\Driver\Query($filter, $options);
            $mongo = new MongoDB\Driver\Manager("mongodb://localhost:27017");
            $cursor = $mongo->executeQuery('dbgames.games', $query);
            foreach ($cursor as $document) {
                $jogo = new Jogo();
                $jogo->setIdJogo($document->_id);
                $jogo->setNomeJogo($document->jogoNome);
                $jogo->setAnoJogo($document->anoJogo);
                $jogo->setImgLink($document->imgLink);
                $jogo->setIdPlataforma($document->nomePlat);
                $jogo->setIdGenero($document->generoNome);
                $jogo->setIdEditor($document->editorNome);
                array_push($this->jogos, $jogo);
            }
            return $this->jogos;
        }
    }

    public function pesquisaByNomeJogo($nosql,$nomeJogo) {
        $this->editor = array();
        if($nosql == 0){
            $sql = "select * from jogo where jogoNome like \"%$nomeJogo%\"";
            $result = $this->connection->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $jogo = new Jogo();
                    $jogo->setIdJogo($row["idJogo"]);
                    $jogo->setNomeJogo($row["jogoNome"]);
                    $jogo->setAnoJogo($row["anoJogo"]);
                    $jogo->setImgLink($row["imgLink"]);
                    $jogo->setIdPlataforma($row["idPlataforma"]);
                    $jogo->setIdGenero($row["idGenero"]);
                    $jogo->setIdEditor($row["idEditor"]);
                    array_push($this->jogos, $jogo);
                }
            }
            return $this->jogos;
        }
        else{
            $options = [];
            $filter = [ 'jogoNome' => new MongoDB\BSON\Regex($nomeJogo."+",'i')];
            $query = new MongoDB\Driver\Query($filter, $options);
            $mongo = new MongoDB\Driver\Manager("mongodb://localhost:27017");
            $cursor = $mongo->executeQuery('dbgames.games', $query);
            foreach ($cursor as $document) {
                $jogo = new Jogo();
                $jogo->setIdJogo($document->_id);
                $jogo->setNomeJogo($document->jogoNome);
                $jogo->setAnoJogo($document->anoJogo);
                $jogo->setImgLink($document->imgLink);
                $jogo->setIdPlataforma($document->nomePlat);
                $jogo->setIdGenero($document->generoNome);
                $jogo->setIdEditor($document->editorNome);
                array_push($this->jogos, $jogo);
            }
            return $this->jogos;
        }
    }

    public function pesquisaByGeneroJogo($nosql,$genero) {
        $this->editor = array();
        if($nosql == 0){
            $sql = "select j.* from jogo j join genero g on j.idGenero = g.idGenero "
                    . "where g.generoNome like \"%$genero%\"";
            $result = $this->connection->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $jogo = new Jogo();
                    $jogo->setIdJogo($row["idJogo"]);
                    $jogo->setNomeJogo($row["jogoNome"]);
                    $jogo->setAnoJogo($row["anoJogo"]);
                    $jogo->setImgLink($row["imgLink"]);
                    $jogo->setIdPlataforma($row["idPlataforma"]);
                    $jogo->setIdGenero($row["idGenero"]);
                    $jogo->setIdEditor($row["idEditor"]);
                    array_push($this->jogos, $jogo);
                }
            }
            return $this->jogos;
        }
        else{
            $options = [];
            $filter = [ 'generoNome' => new MongoDB\BSON\Regex($genero."+",'i')];
            $query = new MongoDB\Driver\Query($filter, $options);
            $mongo = new MongoDB\Driver\Manager("mongodb://localhost:27017");
            $cursor = $mongo->executeQuery('dbgames.games', $query);
            foreach ($cursor as $document) {
                $jogo = new Jogo();
                $jogo->setIdJogo($document->_id);
                $jogo->setNomeJogo($document->jogoNome);
                $jogo->setAnoJogo($document->anoJogo);
                $jogo->setImgLink($document->imgLink);
                $jogo->setIdPlataforma($document->nomePlat);
                $jogo->setIdGenero($document->generoNome);
                $jogo->setIdEditor($document->editorNome);
                array_push($this->jogos, $jogo);
            }
            return $this->jogos;
        }
    }

    public function pesquisaByAnoJogo($nosql,$ano) {
        $this->editor = array();
        if($nosql == 0){
            $sql = "select * from jogo where anoJogo = $ano";
            $result = $this->connection->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $jogo = new Jogo();
                    $jogo->setIdJogo($row["idJogo"]);
                    $jogo->setNomeJogo($row["jogoNome"]);
                    $jogo->setAnoJogo($row["anoJogo"]);
                    $jogo->setImgLink($row["imgLink"]);
                    $jogo->setIdPlataforma($row["idPlataforma"]);
                    $jogo->setIdGenero($row["idGenero"]);
                    $jogo->setIdEditor($row["idEditor"]);
                    array_push($this->jogos, $jogo);
                }
            }
            return $this->jogos;
        }
        else{
            $options = [];
            $filter = [ 'anoJogo' => (int) $ano];
            $query = new MongoDB\Driver\Query($filter, $options);
            $mongo = new MongoDB\Driver\Manager("mongodb://localhost:27017");
            $cursor = $mongo->executeQuery('dbgames.games', $query);
            foreach ($cursor as $document) {
                $jogo = new Jogo();
                $jogo->setIdJogo($document->_id);
                $jogo->setNomeJogo($document->jogoNome);
                $jogo->setAnoJogo($document->anoJogo);
                $jogo->setImgLink($document->imgLink);
                $jogo->setIdPlataforma($document->nomePlat);
                $jogo->setIdGenero($document->generoNome);
                $jogo->setIdEditor($document->editorNome);
                array_push($this->jogos, $jogo);
            }
            return $this->jogos;
        }
    }
    
    public function pesquisaByIdJogo($nosql,$idJogo){
        $this->jogos = array();
        if($nosql == 0){
            $sql = "select * from jogo where idJogo = $idJogo"; 
            $result = $this->connection->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $jogo = new Jogo();
                    $jogo->setIdJogo($row["idJogo"]);
                    $jogo->setNomeJogo($row["jogoNome"]);
                    $jogo->setAnoJogo($row["anoJogo"]);
                    $jogo->setImgLink($row["imgLink"]);
                    $jogo->setIdPlataforma($row["idPlataforma"]);
                    $jogo->setIdGenero($row["idGenero"]);
                    $jogo->setIdEditor($row["idEditor"]);
                    array_push($this->jogos, $jogo);
                }
            }
            return $this->jogos;
        }
        else{
            $options = [];
            $filter = [ "_id" => new MongoDB\BSON\ObjectId($idJogo)];
            $query = new MongoDB\Driver\Query($filter, $options);
            $mongo = new MongoDB\Driver\Manager("mongodb://localhost:27017");
            $cursor = $mongo->executeQuery('dbgames.games', $query);
            foreach ($cursor as $document) {
                $jogo = new Jogo();
                $jogo->setIdJogo($document->_id);
                $jogo->setNomeJogo($document->jogoNome);
                $jogo->setAnoJogo($document->anoJogo);
                $jogo->setImgLink($document->imgLink);
                $jogo->setIdPlataforma($document->nomePlat);
                $jogo->setIdGenero($document->generoNome);
                $jogo->setIdEditor($document->editorNome);
                array_push($this->jogos, $jogo);
            }
            return $this->jogos;
        }
    }
    
    public function insertJogo($nosql,$jogo){
        $jogoNome = $jogo->nomeJogo;
        $anoJogo = $jogo->anoJogo;
        $imgLink = $jogo->imgLink;
        $idPlataforma = $jogo->idPlataforma;
        $idGenero = $jogo->idGenero;
        $idEditor = $jogo->idEditor;
        if($nosql == 0){
            $sql = "insert into jogo (jogoNome,anoJogo,imgLink,idPlataforma,idGenero,idEditor) values (\"$jogoNome\",$anoJogo,\"$imgLink\",$idPlataforma,$idGenero,$idEditor)";

            if ($this->connection->query($sql) === TRUE) {
                echo "<br>Registro Inserido com Sucesso!";
            } else {
                echo "Error: " . $sql . "<br>" . $this->connection->error;
            }
        }
        else{
            $mongo = new MongoDB\Driver\Manager("mongodb://localhost:27017");
            $bulk = new MongoDB\Driver\BulkWrite;
            $bulk->insert(["jogoNome" => $jogoNome,"anoJogo" => $anoJogo, "imgLink" => $imgLink, "nomePlat" => $idPlataforma, "generoNome" => $idGenero, "editorNome" => $idEditor]);
            $mongo->executeBulkWrite('dbgames.games', $bulk);
            echo "Registro Inserido com Sucesso!";
        }
    }
    
    public function pesquisaIdJogo($nosql,$imgLink){
        if($nosql == 0){
            $sql = "select idJogo from jogo where imgLink = \"$imgLink\"";
            $result = $this->connection->query($sql);
            $idJogo = NULL;
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $idJogo = $row["idJogo"];
                }
            }
            return $idJogo;
        }
        else{
            $options = [];
            $filter = [ "imgLink" => $imgLink];
            $query = new MongoDB\Driver\Query($filter, $options);
            $mongo = new MongoDB\Driver\Manager("mongodb://localhost:27017");
            $cursor = $mongo->executeQuery('dbgames.games', $query);
            $idJogo = NULL;
            foreach ($cursor as $document) {
                $idJogo = $document->_id;
            }
            return $idJogo;
        }
    }
    
    public function updateJogo($nosql,$jogo){
        $idJogo = $jogo->idJogo;
        $jogoNome = $jogo->nomeJogo;
        $anoJogo = $jogo->anoJogo;
        $idPlataforma = $jogo->idPlataforma;
        $idGenero = $jogo->idGenero;
        $idEditor = $jogo->idEditor;
        if($nosql == 0){
            $sql = "update jogo set jogoNome = \"$jogoNome\", anoJogo = $anoJogo, idPlataforma = $idPlataforma, "
                    . "idGenero = $idGenero, idEditor = $idEditor where idJogo = $idJogo";

            if ($this->connection->query($sql) === TRUE) {
                echo "<br>Jogo Atualizado com sucesso!";
            } else {
                echo "Error: " . $sql . "<br>" . $this->connection->error;
            }
        }
        else{
            $bulk = new MongoDB\Driver\BulkWrite;
            $bulk->update(
                ['_id' => new MongoDB\BSON\ObjectId($idJogo)],
                ['$set' => ["jogoNome" => $jogoNome,"anoJogo" => $anoJogo, "nomePlat" => $idPlataforma,"generoNome" => $idGenero,"editorNome" => $idEditor]],
                ['multi' => false, 'upsert' => false]
            );
            $manager = new MongoDB\Driver\Manager('mongodb://localhost:27017');
            $result = $manager->executeBulkWrite('dbgames.games', $bulk);
            echo "Registro Alterado com Sucesso!";
        }
    }
    
    public function removeJogo($nosql,$idJogo){
        if($nosql == 0){
            $sql = "delete from jogo where idJogo = $idJogo";
            if ($this->connection->query($sql) === TRUE) {
                echo "<br>Registro Removido com Sucesso!";
            } else {
                echo "Error: " . $sql . "<br>" . $this->connection->error;
            }
        }
        else{
            $bulk = new MongoDB\Driver\BulkWrite;
            $bulk->delete(["_id" => new MongoDB\BSON\ObjectId($idJogo)]);
            $manager = new MongoDB\Driver\Manager('mongodb://localhost:27017');
            $result = $manager->executeBulkWrite('dbgames.games', $bulk);
            echo "Registro Removido com Sucesso!";
        }
    }

}
