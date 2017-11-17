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
include ("C:\wamp64\www\PGBD_TrabFinal\php\InterfaceDAO\IPlataformaDAO.php");
include ("C:\wamp64\www\PGBD_TrabFinal\php\Objects\Plataforma.php");

class PlataformaDAO implements IPlataformaDAO{
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

    public function getPlataformaByIdJogo($idJogo) {
        $sql = "select p.idPlataforma,p.nomePlat from jogo j join plataforma p on j.idPlataforma = p.idPlataforma "
                . "where idJogo = $idJogo";
        $result = $this->connection->query($sql); 
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $plat = new Plataforma();
                $plat->setIdPlataforma($row["idPlataforma"]);
                $plat->setNomePlat($row["nomePlat"]);
                array_push($this->plataforma, $plat);
            }
        }
        return $this->plataforma;
    }
    
    public function getRankPlataforma() {
        $sql = "select p.idPlataforma,p.nomePlat from jogo j join plataforma p on j.idPlataforma = p.idPlataforma "
                . "where idJogo = $idJogo";
        $result = $this->connection->query($sql); 
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $plat = new Plataforma();
                $plat->setIdPlataforma($row["idPlataforma"]);
                $plat->setNomePlat($row["nomePlat"]);
                array_push($this->plataforma, $plat);
            }
        }
        return $this->plataforma;
    }

}
