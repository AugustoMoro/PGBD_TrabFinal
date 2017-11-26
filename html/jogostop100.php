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
        <div>
            <center>
                <?php
                $nosql = $_GET["bdtipo"];
                include($_SERVER['DOCUMENT_ROOT']."/PGBD_TrabFinal/php/DAO/JogoDAO.php");
                $jogoDAO = new JogoDAO();
                $jogos = $jogoDAO->getTop100($nosql);
                for ($i = 0; $i < count($jogos); $i++) {
                    $idJogo = $jogos[$i]->idJogo;
                    $imgLink = $jogos[$i]->imgLink;
                    $anoJogo = $jogos[$i]->anoJogo;
                    echo "<h2> " . ($i + 1) . " - " . $jogos[$i]->nomeJogo . " (" . $anoJogo . ")". "<h2><br>";
                    echo "<img src=\"" . $imgLink . "\" width=\"500\" height=\"300\" />";
                    echo "<a href=\"http://localhost/PGBD_TrabFinal/html/informacoesjogo.php?idjogo=$idJogo&img=$imgLink&anojogo=$anoJogo&bdtipo=$nosql\"><br><font size=\"4\"> Informações do Jogo </font></a>";
                    echo "<br><br><br>";
                }

                ?>
            </center>
        </div>
    </body>
</html>
