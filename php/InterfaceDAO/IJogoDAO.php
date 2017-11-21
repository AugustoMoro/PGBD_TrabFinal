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
    public function getTop100();
    public function getJogosByPlataforma($plataforma);
    public function getJogosByGenero($genero);
    public function pesquisaByNomeJogo($nomeJogo);
    public function pesquisaByGeneroJogo($genero);
    public function pesquisaByAnoJogo($ano);
    public function pesquisaIdJogo($imgLink);
    public function insertJogo($jogoNome,$anoJogo,$imgLink,$idPlataforma,$idGenero,$idEditor);
    public function updateJogo($idJogo,$jogoNome,$anoJogo,$idPlataforma,$idGenero,$idEditor);
}
