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
interface IVendasDAO {
    public function __construct();
    public function getVendasByIdJogo($idJogo);
    public function getVendasByIdVendas($idVendas);
    public function insertVendas($idJogo,$NA_vendas,$EU_vendas,$JP_vendas,$outras_vendas,$vendas_globais,$vendas_totais);
}
