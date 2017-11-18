<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
    <center>
        <?php
        echo "<h1> Rank das platafomas mais vendidas </h1>";
        include ("../php/DAO/PlataformaDAO.php");
        $plataformaDAO = new PlataformaDAO();
        $platRank = $plataformaDAO->getRankPlataforma();
        foreach ($platRank as $chave => $valor) {
            echo  "<font size=\"5\">" . $chave . "<br></font>";
            echo  "<font size=\"4\">" . $valor . " milhões<br></font>";
            echo "<a href=\"http://localhost/PGBD_TrabFinal/html/jogoporplataforma.php?plat=$chave\"><font size=\"4\"> Listar Jogos Desta Plataforma <br><br></font></a>";
        }
        ?>
    </center>
</body>
</html>
