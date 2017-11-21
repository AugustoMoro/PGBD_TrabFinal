<?php
include ("../php/DAO/JogoDAO.php");
include ("../php/DAO/VendasDAO.php");
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
    $jogoDAO = new JogoDAO();
    $jogoDAO->updateJogo($idJogo, $nomeJogo, $anoJogo, $plataforma, $genero, $editor);
    $vendasDAO = new VendasDAO();
    $vendasDAO->updateVendas($idJogo, $NA_vendas, $EU_vendas, $JP_vendas, $outras_vendas, $vendas_globais, $vendas_totais);
    
    
}
?>