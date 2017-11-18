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
        $plataforma = $_GET["plat"];

        include ("../php/DAO/JogoDAO.php");
        $jogoDAO = new JogoDAO();
        $jogos = $jogoDAO->getJogosByPlataforma($plataforma);
        for ($i = 0; $i < count($jogos); $i++) {
            $idJogo = $jogos[$i]->idJogo;
            $imgLink = $jogos[$i]->imgLink;
            $anoJogo = $jogos[$i]->anoJogo;
            echo "<h2> " . ($i + 1) . " - " . $jogos[$i]->nomeJogo . " (" . $anoJogo . ")" . "<h2><br>";
            echo "<img src=\"" . $imgLink . "\" width=\"500\" height=\"300\" />";
            echo "<br><br><br>";
        }
        ?>
    </center>
</body>
</html>
