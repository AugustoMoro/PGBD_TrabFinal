<?php
include ("../php/DAO/EditorDAO.php");
$editorNome = NULL;
if(isset($_GET["nome"])){
    $editorNome = $_GET["nome"];
}
$editorDAO = new EditorDAO();
$editorDAO->insertEditor($editorNome);
echo "<form action=\"http://localhost/PGBD_TrabFinal/html/inserir.php?nome\" method=\"get\">";
echo "<input type=\"submit\" value=\"Voltar\">";
?>