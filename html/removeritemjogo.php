<?php
include ("../php/DAO/JogoDAO.php");
$idJogo = NULL;
if(isset($_POST["idjogo"])){
    $idJogo = $_POST["idjogo"];
    $imagem = 
    $jogoDAO = new JogoDAO();
    $jogo = $jogoDAO->pesquisaByIdJogo($idJogo);
    $imagem = $jogo[0]->imgLink;
    list($i0,$i1,$i2,$i3,$i4,$i5) = explode("/", $imagem);
    $caminhoImg = "../images/".$i5;
    $jogoDAO->removeJogo($idJogo);
    unlink($caminhoImg);
}
?>