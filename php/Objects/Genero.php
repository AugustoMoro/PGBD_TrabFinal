<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Genero
 *
 * @author morov
 */
class Genero {
    var $idGenero;
    var $generoNome;
    
    function __construct() {
        
    }
    
    function getIdGenero() {
        return $this->idGenero;
    }

    function getGeneroNome() {
        return $this->generoNome;
    }
    function setIdGenero($idGenero) {
        $this->idGenero = $idGenero;
    }

    function setGeneroNome($generoNome) {
        $this->generoNome = $generoNome;
    }





}
