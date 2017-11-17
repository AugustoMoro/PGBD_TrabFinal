<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DB
 *
 * @author morov
 */
class DB {
    var $host;
    var $user;
    var $senha;
    var $banco;
    
    function __construct() {
        $this->host = "localhost";
        $this->user = "root";
        $this->senha = "";
        $this->banco = "games";
    }
    
    public function getHost() {
        return $this->host;
    }

    public function getUser() {
        return $this->user;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function getBanco() {
        return $this->banco;
    }


}
