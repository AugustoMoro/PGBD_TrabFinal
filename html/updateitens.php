<?php
include($_SERVER['DOCUMENT_ROOT']."/PGBD_TrabFinal/php/DAO/JogoDAO.php");
include($_SERVER['DOCUMENT_ROOT']."/PGBD_TrabFinal/php/DAO/VendasDAO.php");
include_once($_SERVER['DOCUMENT_ROOT']."/PGBD_TrabFinal/php/Objects/Vendas.php");
include_once($_SERVER['DOCUMENT_ROOT']."/PGBD_TrabFinal/php/Objects/Jogo.php");
$nomeJogo = NULL;
$anoJogo = NULL;
$genero = NULL;
$plataforma = NULL;
$editor = NULL;
$NA_vendas = NULL;
$EU_vendas = NULL;
$JP_vendas = NULL;
$outras_vendas = NULL;
$vendas_globais = NULL;
$vendas_totais = NULL;
$idJogo = NULL;
$nosql = $_POST["bdtipo"];
if(isset($_POST["nome"]) && isset($_POST["ano"]) && isset($_POST["genero"]) && isset($_POST["plataforma"]) && isset($_POST["editor"])
       && isset($_POST["idjogo"]) && isset($_POST["NA_vendas"]) && isset($_POST["EU_vendas"]) && isset($_POST["JP_vendas"])
       && isset($_POST["outras_vendas"]) && isset($_POST["vendas_globais"])){
    $nomeJogo = $_POST["nome"];
    $anoJogo = $_POST["ano"];
    $genero = $_POST["genero"];
    $plataforma = $_POST["plataforma"];
    $editor = $_POST["editor"];
    $idJogo = $_POST["idjogo"];
    $NA_vendas = $_POST["NA_vendas"];
    $EU_vendas = $_POST["EU_vendas"];
    $JP_vendas = $_POST["JP_vendas"];
    $outras_vendas = $_POST["outras_vendas"];
    $vendas_globais = $_POST["vendas_globais"];
    $vendas_totais = $NA_vendas + $EU_vendas + $JP_vendas + $outras_vendas + $vendas_globais;
    $jogo = new Jogo();
    $jogo->setIdJogo($idJogo);
    $jogo->setNomeJogo($nomeJogo);
    $jogo->setAnoJogo($anoJogo);
    $jogo->setIdPlataforma($plataforma);
    $jogo->setIdGenero($genero);
    $jogo->setIdEditor($editor);
    $jogoDAO = new JogoDAO();
    $jogoDAO->updateJogo($nosql,$jogo);
    $venda = new Vendas();
    $venda->setNA_vendas($NA_vendas);
    $venda->setEU_vendas($EU_vendas);
    $venda->setJP_vendas($JP_vendas);
    $venda->setOutras_vendas($outras_vendas);
    $venda->setVendas_globais($vendas_globais);
    $venda->setVendas_totais($vendas_totais);
    $venda->setIdJogo($idJogo);
    $vendasDAO = new VendasDAO();
    $vendasDAO->updateVendas($nosql,$venda);
    
    
}
?>