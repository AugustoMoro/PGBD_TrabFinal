<?php
include($_SERVER['DOCUMENT_ROOT']."/PGBD_TrabFinal/php/DAO/JogoDAO.php");
include($_SERVER['DOCUMENT_ROOT']."/PGBD_TrabFinal/php/DAO/VendasDAO.php");
include_once($_SERVER['DOCUMENT_ROOT']."/PGBD_TrabFinal/php/Objects/Jogo.php");
include_once($_SERVER['DOCUMENT_ROOT']."/PGBD_TrabFinal/php/Objects/Vendas.php");
$nomeJogo = NULL;
$anoJogo = NULL;
$idEditor = NULL;
$idPlat = NULL;
$idGen = NULL;
$imagem = NULL;
$NA_sales = NULL;
$EU_sales = NULL;
$JP_sales = NULL;
$other_sales = NULL;
$global_sales = NULL;
$total_sales = NULL;
$nosql = $_POST["bdtipo"];
if(isset($_POST["nome"]) && isset($_POST["genero"]) && isset($_POST["plataforma"]) && isset($_POST["editor"]) && isset($_POST["ano"]) && isset($_FILES["imagem"])
        && $_POST["NA_sales"] && $_POST["EU_sales"] && $_POST["JP_sales"] && $_POST["other_sales"] && $_POST["global_sales"]){
    $nomeJogo = $_POST["nome"];
    $anoJogo = $_POST["ano"];
    $idEditor = $_POST["editor"];
    $idPlat = $_POST["plataforma"];
    $idGen = $_POST["genero"];
    $NA_sales = $_POST["NA_sales"];
    $EU_sales = $_POST["EU_sales"];
    $JP_sales = $_POST["JP_sales"];
    $other_sales = $_POST["other_sales"];
    $global_sales = $_POST["global_sales"];
    $imagem = $_FILES["imagem"];
    if($imagem != NULL){
        $nomeImg = time().'.jpg';
        $caminhoImg = $_SERVER['DOCUMENT_ROOT'].'/PGBD_TrabFinal/images/' . $nomeImg;
        if (move_uploaded_file($imagem['tmp_name'], $caminhoImg)) {
		        $imgLink = "http://localhost/PGBD_TrabFinal/images/".$nomeImg;
		        $jogo = new Jogo();
		        $jogo->setNomeJogo($nomeJogo);
		        $jogo->setAnoJogo($anoJogo);
		        $jogo->setImgLink($imgLink);
		        $jogo->setIdPlataforma($idPlat);
		        $jogo->setIdGenero($idGen);
		        $jogo->setIdEditor($idEditor);
                $jogoDAO = new JogoDAO();
                $jogoDAO->insertJogo($nosql,$jogo);
                $idJogo = $jogoDAO->pesquisaIdJogo($nosql,$imgLink);
                $vendas = new Vendas();
                $vendas->setNA_vendas($NA_sales);
                $vendas->setEU_vendas($EU_sales);
                $vendas->setJP_vendas($JP_sales);
                $vendas->setOutras_vendas($other_sales);
                $vendas->setVendas_globais($global_sales);
                $vendasDAO = new VendasDAO();
                $total_sales = $NA_sales + $EU_sales + $JP_sales + $other_sales + $global_sales;
                $vendas->setVendas_totais($total_sales);
                $vendas->setIdJogo($idJogo);
                $vendasDAO->insertVendas($nosql,$vendas);
	}
    }
}
?>