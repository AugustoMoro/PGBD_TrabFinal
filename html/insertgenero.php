<?php
include ("../php/DAO/GeneroDAO.php");
$nomeGenero = NULL;
if(isset($_GET["nome"])){
    $nomeGenero = $_GET["nome"];
}
$generoDAO = new GeneroDAO();
$generoDAO->insertGenero($nomeGenero);
echo "<form action=\"http://localhost/PGBD_TrabFinal/html/inserir.php?nome\" method=\"get\">";
echo "<input type=\"submit\" value=\"Voltar\">";
?>
