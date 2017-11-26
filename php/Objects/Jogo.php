<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of JogoObject
 *
 * @author morov
 */
class Jogo {
    var $idJogo;
    var $nomeJogo;
    var $anoJogo;
    var $imgLink;
    var $idPlataforma;
    var $idGenero;
    var $idEditor;
    var $idVendas;
    
    function __construct() {
        
    }
    
    function getIdJogo() {
        return $this->idJogo;
    }

    function getNomeJogo() {
        return $this->nomeJogo;
    }

    function getAnoJogo() {
        return $this->anoJogo;
    }

    function getImgLink() {
        return $this->imgLink;
    }

    function getIdPlataforma() {
        return $this->idPlataforma;
    }

    function getIdGenero() {
        return $this->idGenero;
    }

    function getIdEditor() {
        return $this->idEditor;
    }

    function getIdVendas() {
        return $this->idVendas;
    }
    
    function setIdJogo($idJogo) {
        $this->idJogo = $idJogo;
    }

    function setNomeJogo($nomeJogo) {
        $this->nomeJogo = $nomeJogo;
    }

    function setAnoJogo($anoJogo) {
        $this->anoJogo = $anoJogo;
    }

    function setImgLink($imgLink) {
        $this->imgLink = $imgLink;
    }

    function setIdPlataforma($idPlataforma) {
        $this->idPlataforma = $idPlataforma;
    }

    function setIdGenero($idGenero) {
        $this->idGenero = $idGenero;
    }

    function setIdEditor($idEditor) {
        $this->idEditor = $idEditor;
    }

    function setIdVendas($idVendas) {
        $this->idVendas = $idVendas;
    }
    
}
