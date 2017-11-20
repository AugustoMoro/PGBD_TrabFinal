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
interface IGeneroDAO {
    public function __construct();
    public function getGeneroByIdJogo($idJogo);
    public function getRankGenero();
    public function getGeneroGyIdGen($idGen);
    public function getTodosGeneros();
    public function insertGenero($nomeGenero);
}
