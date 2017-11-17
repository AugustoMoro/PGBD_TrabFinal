<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Plataforma
 *
 * @author morov
 */
class Plataforma {
    var $idPlataforma;
    var $nomePlat;
    
    function __construct() {
        
    }
    
    function getIdPlataforma() {
        return $this->idPlataforma;
    }

    function getNomePlat() {
        return $this->nomePlat;
    }
    function setIdPlataforma($idPlataforma) {
        $this->idPlataforma = $idPlataforma;
    }

    function setNomePlat($nomePlat) {
        $this->nomePlat = $nomePlat;
    }


}
