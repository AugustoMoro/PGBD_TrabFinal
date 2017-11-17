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
include ("C:\wamp64\www\PGBD_TrabFinal\php\InterfaceDAO\IVendasDAO.php");
include ("C:\wamp64\www\PGBD_TrabFinal\php\Objects\Vendas.php");

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

    public function getVendasByIdJogo($idJogo) {
        $sql = "select v.idVendas,v.NA_vendas,v.EU_vendas,v.JP_vendas,v.outras_vendas,v.vendas_globais,v.vendas_totais "
                . "from jogo j join vendas v on j.idVendas = v.idVendas " 
                . "where j.idJogo = $idJogo";
        $result = $this->connection->query($sql); 
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $v = new Vendas();
                $v->setIdVendas($row["idVendas"]);
                $v->setNA_vendas($row["NA_vendas"]);
                $v->setEU_vendas($row["EU_vendas"]);
                $v->setJP_vendas($row["JP_vendas"]);
                $v->setOutras_vendas($row["outras_vendas"]);
                $v->setVendas_globais($row["vendas_globais"]);
                $v->setVendas_totais($row["vendas_totais"]);
                array_push($this->vendas, $v);
            }
        }
        return $this->vendas;
    }

}
