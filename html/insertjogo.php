<?php
include ("../php/DAO/JogoDAO.php");
include ("../php/DAO/VendasDAO.php");
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
        $caminhoImg = '../images/' . $nomeImg;
        if (move_uploaded_file($imagem['tmp_name'], $caminhoImg)) {
		$imgLink = "http://localhost/PGBD_TrabFinal/images/".$nomeImg;
                $jogoDAO = new JogoDAO();
                $jogoDAO->insertJogo($nomeJogo, $anoJogo, $imgLink, $idPlat, $idGen, $idEditor);
                $idJogo = $jogoDAO->pesquisaIdJogo($imgLink);
                $vendasDAO = new VendasDAO();
                $total_sales = $NA_sales + $EU_sales + $JP_sales + $other_sales + $global_sales;
                $vendasDAO->insertVendas($idJogo, $NA_sales, $EU_sales, $JP_sales, $other_sales, $global_sales, $total_sales);
	}
    }
}
?>