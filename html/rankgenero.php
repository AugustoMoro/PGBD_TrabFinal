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
        include ("../php/DAO/GeneroDAO.php");
        $generoDAO = new GeneroDAO();
        $genero = $generoDAO->getRankGenero();
        foreach ($genero as $chave => $valor) {
            echo "<font size=\"5\">" . $chave . "<br></font>";
            echo "<font size=\"4\">" . $valor . " milhões<br></font>";
            echo "<a href=\"http://localhost/PGBD_TrabFinal/html/jogoporgenero.php?gen=$chave\"><font size=\"4\"> Listar Jogos Deste Gênero <br><br></font></a>";
        }
        // put your code here
        ?>
    </center>
</body>
</html>
