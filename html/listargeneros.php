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
        include($_SERVER['DOCUMENT_ROOT']."/PGBD_TrabFinal/php/DAO/GeneroDAO.php");
        $generoDAO = new GeneroDAO();
        $genero = $generoDAO->getTodosGeneros($nosql);
        foreach ($genero as $g) {
            $chave = $g->generoNome;
            echo "<font size=\"5\">" . $chave . "<br></font>";
            echo "<a href=\"http://localhost/PGBD_TrabFinal/html/jogoporgenero.php?gen=$chave&bdtipo=$nosql\"><font size=\"4\"> Listar Jogos Deste Gênero <br><br></font></a>";
        }
        // put your code here
        ?>
    </center>
</body>
</html>
