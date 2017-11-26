<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of VendasDAO
 *
 * @author morov
 */
include_once("DB.php");
include($_SERVER['DOCUMENT_ROOT']."/PGBD_TrabFinal/php/InterfaceDAO/IVendasDAO.php");
include($_SERVER['DOCUMENT_ROOT']."/PGBD_TrabFinal/php/Objects/Vendas.php");

class VendasDAO implements IVendasDAO {

    var $db;
    var $connection;
    var $vendas;

    public function __construct() {
        $this->db = new DB();
        $this->connection = mysqli_connect($this->db->getHost(), $this->db->getUser(), $this->db->getSenha(), $this->db->getBanco());
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
        mysqli_set_charset($this->connection, 'utf8');
        $this->vendas = array();
    }

    public function getVendasByIdJogo($nosql,$idJogo) {
        $this->vendas = array();
        if($nosql == 0){
            $sql = "select v.idVendas,v.NA_vendas,v.EU_vendas,v.JP_vendas,v.outras_vendas,v.vendas_globais,v.vendas_totais, v.idJogo "
                    . "from jogo j join vendas v on j.idJogo = v.idJogo " 
                    . "where j.idJogo = $idJogo";
            $result = $this->connection->query($sql); 
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $v = new Vendas();
                    $v->setIdVendas($row["idVendas"]);
                    $v->setNA_vendas($row["NA_vendas"]);
                    $v->setEU_vendas($row["EU_vendas"]);
                    $v->setJP_vendas($row["JP_vendas"]);
                    $v->setOutras_vendas($row["outras_vendas"]);
                    $v->setVendas_globais($row["vendas_globais"]);
                    $v->setVendas_totais($row["vendas_totais"]);
                    $v->setIdJogo($row["idJogo"]);
                    array_push($this->vendas, $v);
                }
            }
            return $this->vendas;
        }
        else{
            $mongo = new MongoDB\Driver\Manager("mongodb://localhost:27017");
            $id = new \MongoDB\BSON\ObjectId($idJogo);
            $filter = ["_id" => $id];
            $options = [];
            $query = new MongoDB\Driver\Query($filter, $options);
            $cursor = $mongo->executeQuery('dbgames.games', $query);
            foreach ($cursor as $document) {
                $v = new Vendas();
                $v->setIdVendas($document->_id);
                $v->setNA_vendas($document->NA_vendas);
                $v->setEU_vendas($document->EU_vendas);
                $v->setJP_vendas($document->JP_vendas);
                $v->setOutras_vendas($document->outras_vendas);
                $v->setVendas_globais($document->vendas_globais);
                $v->setVendas_totais($document->vendas_totais);
                $v->setIdJogo($document->_id);
                array_push($this->vendas, $v);
            }
            return $this->vendas;
        }
    }
    
    public function getVendasByIdVendas($idVendas){
        $this->vendas = array();
        $sql = "select * from vendas where idVendas = $idVendas"; 
        $result = $this->connection->query($sql); 
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $v = new Vendas();
                $v->setIdVendas($row["idVendas"]);
                $v->setNA_vendas($row["NA_vendas"]);
                $v->setEU_vendas($row["EU_vendas"]);
                $v->setJP_vendas($row["JP_vendas"]);
                $v->setOutras_vendas($row["outras_vendas"]);
                $v->setVendas_globais($row["vendas_globais"]);
                $v->setVendas_totais($row["vendas_totais"]);
                $v->setIdJogo($row["idJogo"]);
                array_push($this->vendas, $v);
            }
        }
        return $this->vendas;
    }
    public function insertVendas($nosql,$vendas){
        $idJogo = $vendas->idJogo;
        $NA_vendas = $vendas->NA_vendas;
        $EU_vendas = $vendas->EU_vendas;
        $JP_vendas = $vendas->JP_vendas;
        $outras_vendas = $vendas->outras_vendas;
        $vendas_globais = $vendas->vendas_globais;
        $vendas_totais = $vendas->vendas_totais;
        if($nosql == 0){
            $sql = "insert into vendas (idJogo,NA_vendas,EU_vendas,JP_vendas,outras_vendas,vendas_globais,vendas_totais) "
                        . "values ($idJogo,$NA_vendas,$EU_vendas,$JP_vendas,$outras_vendas,$vendas_globais,$vendas_totais)";
            if ($this->connection->query($sql) === TRUE) {
                echo "<br>Venda inserida com sucesso!";
                echo "<a href=\"http://localhost/PGBD_TrabFinal/html/inseriritens.php\">Voltar à lista de jogos<br><br></a>";
            } else {
                echo "Error: " . $sql . "<br>" . $this->connection->error;
            }
        }
        else{
            $bulk = new MongoDB\Driver\BulkWrite;
            $bulk->update(
                ["_id" => $idJogo],
                ['$set' => ["NA_vendas" => $NA_vendas,"EU_vendas" => $EU_vendas,"JP_vendas" => $JP_vendas,"outras_vendas" => $outras_vendas,"vendas_globais" => $vendas_globais,"vendas_totais" => $vendas_totais]],
                ['multi' => false, 'upsert' => false]
            );
            $manager = new MongoDB\Driver\Manager('mongodb://localhost:27017');
            $result = $manager->executeBulkWrite('dbgames.games', $bulk);
        }
    }
    
    public function updateVendas($nosql,$vendas){
        $NA_vendas = $vendas->NA_vendas;
        $EU_vendas = $vendas->EU_vendas;
        $JP_vendas = $vendas->JP_vendas;
        $outras_vendas = $vendas->outras_vendas;
        $vendas_globais = $vendas->vendas_globais;
        $vendas_totais = $vendas->vendas_totais;
        $idJogo = $vendas->idJogo;
        if($nosql == 0){
            $sql = "update vendas set NA_vendas = $NA_vendas, EU_vendas = $EU_vendas, JP_vendas = $JP_vendas, "
                . "outras_vendas = $outras_vendas, vendas_globais = $vendas_globais, vendas_totais = $vendas_totais "
                    . "where idJogo = $idJogo";
            if ($this->connection->query($sql) === TRUE) {
                echo "<br>Venda Atualizada com Sucesso!";
            } else {
                echo "Error: " . $sql . "<br>" . $this->connection->error;
            }
        }
        else{
            $bulk = new MongoDB\Driver\BulkWrite;
            $bulk->update(
                ['_id' => new MongoDB\BSON\ObjectId($idJogo)],
                ['$set' => ["NA_vendas" => $NA_vendas,"EU_vendas" => $EU_vendas,"JP_vendas" => $JP_vendas,"outras_vendas" => $outras_vendas,"vendas_globais" => $vendas_globais,"vendas_totais" => $vendas_totais]],
                ['multi' => false, 'upsert' => false]
            );
            $manager = new MongoDB\Driver\Manager('mongodb://localhost:27017');
            $result = $manager->executeBulkWrite('dbgames.games', $bulk);
            echo "Registro Alterado com sucesso!";
        }
    }
}
