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
include ("C:\wamp64\www\PGBD_TrabFinal\php\InterfaceDAO\IGeneroDAO.php");
include ("C:\wamp64\www\PGBD_TrabFinal\php\Objects\Genero.php");

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

    public function getGeneroByIdJogo($idJogo) {
        $this->genero = array();
        $sql = "select g.idGenero,generoNome from genero g join jogo j on j.idGenero = g.idGenero where j.idJogo = $idJogo";
        $result = $this->connection->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $gen = new Genero();
                $gen->setIdGenero($row["idGenero"]);
                $gen->setGeneroNome($row["generoNome"]);
                array_push($this->genero, $gen);
            }
        }
        return $this->genero;
    }

    public function getRankGenero() {
        $this->genero = array();
        $sql = "select * from (select sum(v.vendas_totais) as vTotaisPerGen, g.generoNome as nGen from jogo j join genero g join vendas v on j.idGenero = g.idGenero and v.idJogo = j.idJogo group by nGen) as tab "
                . "order by vTotaisPerGen desc";
        $result = $this->connection->query($sql);
        $arrGen = array();
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $arrGen[$row["nGen"]] = $row["vTotaisPerGen"];
            }
        }
        return $arrGen;
    }

    public function getGeneroGyIdGen($idGen) {
        $this->genero = array();
        $sql = "select * from genero where idGenero = $idGen";
        $result = $this->connection->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $gen = new Genero();
                $gen->setIdGenero($row["idGenero"]);
                $gen->setGeneroNome($row["generoNome"]);
                array_push($this->genero, $gen);
            }
        }
        return $this->genero;
    }

    public function getTodosGeneros() {
        $this->genero = array();
        $sql = "select * from genero";
        $result = $this->connection->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $gen = new Genero();
                $gen->setIdGenero($row["idGenero"]);
                $gen->setGeneroNome($row["generoNome"]);
                array_push($this->genero, $gen);
            }
        }
        return $this->genero;
    }

    public function insertGenero($nomeGenero) {
        $sql = "insert into genero (generoNome) values (\"$nomeGenero\")";

        if ($this->connection->query($sql) === TRUE) {
            echo "<br>Novo gênero inserido com sucesso!";
            echo "<a href=\"http://localhost/PGBD_TrabFinal/html/inserir.php\">Voltar à tela de inserção<br><br></a>";
        } else {
            echo "Error: " . $sql . "<br>" . $this->connection->error;
        }
    }

}
