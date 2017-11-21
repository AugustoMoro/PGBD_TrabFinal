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
        $this->editor = array();
        $sql = "select j.* from jogo j join vendas v on j.idJogo = v.idJogo order by (v.vendas_totais) desc";
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
                //$jogo->setIdVendas($row["idVendas"]);
                array_push($this->jogos, $jogo);
            }
        }
        return $this->jogos;
    }

    public function getJogosByPlataforma($plataforma) {
        $this->editor = array();
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
                //$jogo->setIdVendas($row["idVendas"]);
                array_push($this->jogos, $jogo);
            }
        }
        return $this->jogos;
    }

    public function getJogosByGenero($genero) {
        $this->editor = array();
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
                //$jogo->setIdVendas($row["idVendas"]);
                array_push($this->jogos, $jogo);
            }
        }
        return $this->jogos;
    }

    public function pesquisaByNomeJogo($nomeJogo) {
        $this->editor = array();
        $sql = "select * from jogo where jogoNome like \"%$nomeJogo%\"";
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
                //$jogo->setIdVendas($row["idVendas"]);
                array_push($this->jogos, $jogo);
            }
        }
        return $this->jogos;
    }

    public function pesquisaByGeneroJogo($genero) {
        $this->editor = array();
        $sql = "select j.* from jogo j join genero g on j.idGenero = g.idGenero "
                . "where g.generoNome like \"%$genero%\"";
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
                //$jogo->setIdVendas($row["idVendas"]);
                array_push($this->jogos, $jogo);
            }
        }
        return $this->jogos;
    }

    public function pesquisaByAnoJogo($ano) {
        $this->editor = array();
        $sql = "select * from jogo where anoJogo like \"%$ano%\"";
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
                //$jogo->setIdVendas($row["idVendas"]);
                array_push($this->jogos, $jogo);
            }
        }
        return $this->jogos;
    }
    
    public function pesquisaByIdJogo($idJogo){
        $this->editor = array();
        $sql = "select * from jogo where idJogo = $idJogo"; 
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
                //$jogo->setIdVendas($row["idVendas"]);
                array_push($this->jogos, $jogo);
            }
        }
        return $this->jogos;
    }
    
    public function insertJogo($jogoNome,$anoJogo,$imgLink,$idPlataforma,$idGenero,$idEditor){
        $sql = "insert into jogo (jogoNome,anoJogo,imgLink,idPlataforma,idGenero,idEditor) values (\"$jogoNome\",$anoJogo,\"$imgLink\",$idPlataforma,$idGenero,$idEditor)";

        if ($this->connection->query($sql) === TRUE) {
            echo "<br>Novo jogo inserido com sucesso!";
            echo "<a href=\"http://localhost/PGBD_TrabFinal/html/inseriritens.php\">Voltar à lista de jogos<br><br></a>";
        } else {
            echo "Error: " . $sql . "<br>" . $this->connection->error;
        }
    }
    
    public function pesquisaIdJogo($imgLink){
        $this->editor = array();
        $sql = "select idJogo from jogo where imgLink = \"$imgLink\"";
        $result = $this->connection->query($sql);
        $idJogo = NULL;
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $idJogo = $row["idJogo"];
            }
        }
        return $idJogo;
    }
    
    public function updateJogo($idJogo,$jogoNome,$anoJogo,$idPlataforma,$idGenero,$idEditor){
        $sql = "update jogo set jogoNome = \"$jogoNome\", anoJogo = $anoJogo, idPlataforma = $idPlataforma, "
                . "idGenero = $idGenero, idEditor = $idEditor where idJogo = $idJogo";

        if ($this->connection->query($sql) === TRUE) {
            echo "<br>Jogo Atualizado com sucesso!";
        } else {
            echo "Error: " . $sql . "<br>" . $this->connection->error;
        }
    }
    
    public function removeJogo($idJogo){
        $sql = "delete from jogo where idJogo = $idJogo";

        if ($this->connection->query($sql) === TRUE) {
            echo "<br>Jogo Removido com Sucesso!";
            echo "<a href=\"http://localhost/PGBD_TrabFinal/html/removerjogo.php\">Voltar<br><br></a>";
        } else {
            echo "Error: " . $sql . "<br>" . $this->connection->error;
        }
    }

}
