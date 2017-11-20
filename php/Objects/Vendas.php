<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Vendas
 *
 * @author morov
 */
class Vendas {
    var $idVendas;
    var $NA_vendas;
    var $EU_vendas;
    var $JP_vendas;
    var $outras_vendas;
    var $vendas_globais;
    var $vendas_totais;
    var $idJogo;
    
    function __construct() {
        
    }
    
    function getIdJogo() {
        return $this->idJogo;
    }
    
    function getIdVendas() {
        return $this->idVendas;
    }

    function getNA_vendas() {
        return $this->NA_vendas;
    }

    function getEU_vendas() {
        return $this->EU_vendas;
    }

    function getJP_vendas() {
        return $this->JP_vendas;
    }

    function getOutras_vendas() {
        return $this->outras_vendas;
    }

    function getVendas_globais() {
        return $this->vendas_globais;
    }

    function getVendas_totais() {
        return $this->vendas_totais;
    }

    function setIdVendas($idVendas) {
        $this->idVendas = $idVendas;
    }

    function setNA_vendas($NA_vendas) {
        $this->NA_vendas = $NA_vendas;
    }

    function setEU_vendas($EU_vendas) {
        $this->EU_vendas = $EU_vendas;
    }

    function setJP_vendas($JP_vendas) {
        $this->JP_vendas = $JP_vendas;
    }

    function setOutras_vendas($outras_vendas) {
        $this->outras_vendas = $outras_vendas;
    }

    function setVendas_globais($vendas_globais) {
        $this->vendas_globais = $vendas_globais;
    }

    function setVendas_totais($vendas_totais) {
        $this->vendas_totais = $vendas_totais;
    }
    
    function setIdJogo($idJogo) {
        $this->idJogo = $idJogo;
    }



}
