<?php
include ("../php/DAO/PlataformaDAO.php");
$nomePlat = NULL;
if(isset($_GET["nome"])){
    $nomePlat = $_GET["nome"];
}
$plataformaDAO = new PlataformaDAO();
$plataformaDAO->insertPlataforma($nomePlat);
echo "<form action=\"http://localhost/PGBD_TrabFinal/html/inserir.php?nome\" method=\"get\">";
echo "<input type=\"submit\" value=\"Voltar\">";
?>