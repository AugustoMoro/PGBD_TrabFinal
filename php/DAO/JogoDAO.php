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
include ("DB.php");
include ("C:\wamp64\www\PGBD_TrabFinal\php\InterfaceDAO\IJogoDAO.php");
include ("C:\wamp64\www\PGBD_TrabFinal\php\Objects\Jogo.php");

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

    public function getTop100() {
        $sql = "select j.* from jogo j join vendas v on j.idJogo = v.idVendas order by (v.vendas_totais) desc";
        $result = $this->connection->query($sql); 
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $jogo = new Jogo();
                $jogo->setIdJogo($row["idJogo"]);
                $jogo->setNomeJogo($row["jogoNome"]);
                $jogo->setAnoJogo($row["anoJogo"]);
                $jogo->setImgLink($row["imgLink"]);
                $jogo->setIdPlataforma($row["idPlataforma"]);
                $jogo->setIdGenero($row["idGenero"]);
                $jogo->setIdEditor($row["idEditor"]);
                $jogo->setIdVendas($row["idVendas"]);
                array_push($this->jogos, $jogo);
            }
        }
        return $this->jogos;
    }
    
    public function getJogosByPlataforma($plataforma){
        $sql = "select j.* from jogo j join plataforma p on p.idPlataforma = j.idPlataforma "
                . "where p.nomePlat = \"$plataforma\"";
        $result = $this->connection->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $jogo = new Jogo();
                $jogo->setIdJogo($row["idJogo"]);
                $jogo->setNomeJogo($row["jogoNome"]);
                $jogo->setAnoJogo($row["anoJogo"]);
                $jogo->setImgLink($row["imgLink"]);
                $jogo->setIdPlataforma($row["idPlataforma"]);
                $jogo->setIdGenero($row["idGenero"]);
                $jogo->setIdEditor($row["idEditor"]);
                $jogo->setIdVendas($row["idVendas"]);
                array_push($this->jogos, $jogo);
            }
        }
        return $this->jogos;
    }
    
    public function getJogosByGenero($genero){
        $sql = "select j.* from jogo j join genero g on g.idGenero = j.idGenero "
                . "where g.generoNome = \"$genero\"";
        $result = $this->connection->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $jogo = new Jogo();
                $jogo->setIdJogo($row["idJogo"]);
                $jogo->setNomeJogo($row["jogoNome"]);
                $jogo->setAnoJogo($row["anoJogo"]);
                $jogo->setImgLink($row["imgLink"]);
                $jogo->setIdPlataforma($row["idPlataforma"]);
                $jogo->setIdGenero($row["idGenero"]);
                $jogo->setIdEditor($row["idEditor"]);
                $jogo->setIdVendas($row["idVendas"]);
                array_push($this->jogos, $jogo);
            }
        }
        return $this->jogos;
    }

}
