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
        include($_SERVER['DOCUMENT_ROOT']."/PGBD_TrabFinal/php/DAO/JogoDAO.php");
        $jogoDAO = new JogoDAO();
        $jogo = $jogoDAO->getTop100($nosql);
        for($i=0; $i<count($jogo); $i++){
            $idJogo = $jogo[$i]->idJogo;
            $imgLink = $jogo[$i]->imgLink;
            $anoJogo = $jogo[$i]->anoJogo;
            $jogoNome = $jogo[$i]->nomeJogo;
            echo "<a href=\"http://localhost/PGBD_TrabFinal/html/updatejogo.php?idjogo=$idJogo&img=$imgLink&anojogo=$anoJogo&nomejogo=$jogoNome&bdtipo=$nosql\"><br><font size=\"4\"> $jogoNome </font></a>";
        }
        ?>
    </center>
</body>
</html>
