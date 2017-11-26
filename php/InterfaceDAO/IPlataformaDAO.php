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
interface IPlataformaDAO {
    public function __construct();
    public function getPlataformaByIdJogo($nosql,$idJogo);
    public function getPlataformaByIdPlat($nosql,$idPlat);
    public function getTotasPlataformas($nosql);
}
