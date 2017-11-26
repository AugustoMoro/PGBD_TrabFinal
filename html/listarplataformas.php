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
        $nosql = $_GET["bdtipo"];
        echo "<h1> Rank das platafomas mais vendidas </h1>";
        include($_SERVER['DOCUMENT_ROOT']."/PGBD_TrabFinal/php/DAO/PlataformaDAO.php");
        $plataformaDAO = new PlataformaDAO();
        $plat = $plataformaDAO->getTotasPlataformas($nosql);
        foreach ($plat as $p) {
            $valor = $p->nomePlat;
            echo  "<font size=\"5\">$valor<br></font>";
            echo "<a href=\"http://localhost/PGBD_TrabFinal/html/jogoporplataforma.php?plat=$valor&bdtipo=$nosql\"><font size=\"4\"> Listar Jogos Desta Plataforma <br><br></font></a>";
        }
        ?>
    </center>
</body>
</html>
