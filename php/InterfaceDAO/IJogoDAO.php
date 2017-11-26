<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author morov
 */
interface IJogoDAO {
    public function __construct();
    public function getTop100($nosql);
    public function getJogosByPlataforma($nosql,$plataforma);
    public function getJogosByGenero($nosql,$genero);
    public function pesquisaByNomeJogo($nosql,$nomeJogo);
    public function pesquisaByGeneroJogo($nosql,$genero);
    public function pesquisaByAnoJogo($nosql,$ano);
    public function pesquisaIdJogo($nosql,$imgLink);
    public function pesquisaByIdJogo($nosql,$idJogo);
    public function insertJogo($nosql,$jogo);
    public function updateJogo($nosql,$jogo);
    public function removeJogo($nosql,$idJogo);
}
