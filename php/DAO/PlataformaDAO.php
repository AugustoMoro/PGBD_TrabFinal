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
include ("C:\wamp64\www\PGBD_TrabFinal\php\InterfaceDAO\IPlataformaDAO.php");
include ("C:\wamp64\www\PGBD_TrabFinal\php\Objects\Plataforma.php");

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
        $sql = "select * from (select sum(v.vendas_totais) as vTotaisPerPlat, p.nomePlat as nPlat from jogo j join plataforma p join vendas v on p.idPlataforma = j.idPlataforma and v.idJogo = j.idJogo "
                . "group by nPlat) as tab "
                . "order by vTotaisPerPlat desc";
        $result = $this->connection->query($sql);
        $arrPlat = array();
        if ($result->num_rows > 0) {
            // output data of each row
            
            while ($row = $result->fetch_assoc()) {
                $arrPlat[$row["nPlat"]] = $row["vTotaisPerPlat"];
            }
        }
        return $arrPlat;
    }
    
    public function getPlataformaByIdPlat($idPlat){
        $sql = "select * from plataforma where idPlataforma = $idPlat";
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
    
    public function getTotasPlataformas(){
        $sql = "select * from plataforma";
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
    
    public function insertPlataforma($nomePlat){
        $sql = "insert into plataforma (nomePlat) values (\"$nomePlat\")";

        if ($this->connection->query($sql) === TRUE) {
            echo "<br>Nova plataforma inserida com sucesso!";
            echo "<a href=\"http://localhost/PGBD_TrabFinal/html/inserir.php\">Voltar à tela de inserção<br><br></a>";
        } else {
            echo "Error: " . $sql . "<br>" . $this->connection->error;
        }
    }

}
