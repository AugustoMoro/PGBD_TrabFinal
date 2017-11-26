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
    public function getGeneroByIdJogo($nosql,$idJogo);
    public function getGeneroGyIdGen($nosql,$idGen);
    public function getTodosGeneros($nosql);
}
