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
        include ("../php/DAO/JogoDAO.php");
        $jogoDAO = new JogoDAO();
        $jogo = $jogoDAO->getTop100();
        for ($i = 0; $i < count($jogo); $i++) {
            $jogoNome = $jogo[$i]->nomeJogo;
            $idJogo = $jogo[$i]->idJogo;
            echo "<form action=\"http://localhost/PGBD_TrabFinal/html/removeritemjogo.php\" method=\"post\">";
            echo "<input type=\"hidden\" name=\"idjogo\" value=\"$idJogo\">";
            echo $jogoNome;
            echo "<br><input type=\"submit\" value=\"Remover\"><br><br>";
            echo "</form>";
        }
        ?>
    </center>
</body>
</html>
