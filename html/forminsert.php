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
        $val = NULL;
        $tab = NULL;
        if (isset($_GET["val"])) {
            $val = $_GET["val"];
        }
        if(isset($_GET["tabela"])){
            $tab = $_GET["tabela"];
        }
        if($tab == "gen"){
            echo "<form action=\"http://localhost/PGBD_TrabFinal/html/insertgenero.php?nome\" method=\"get\">";
            echo "$val:<br>";
            echo "<input type=\"text\" name=\"nome\"><br>";
            echo "<input type=\"submit\" value=\"Salvar\">";
            echo "</form>";
        }
        if($tab == "plat"){
            echo "<form action=\"http://localhost/PGBD_TrabFinal/html/insertplataforma.php?nome\" method=\"get\">";
            echo "$val:<br>";
            echo "<input type=\"text\" name=\"nome\"><br>";
            echo "<input type=\"submit\" value=\"Salvar\">";
            echo "</form>";
        }
        if($tab == "ed"){
            echo "<form action=\"http://localhost/PGBD_TrabFinal/html/inserteditor.php?nome\" method=\"get\">";
            echo "$val:<br>";
            echo "<input type=\"text\" name=\"nome\"><br>";
            echo "<input type=\"submit\" value=\"Salvar\">";
            echo "</form>";
        }
        
        ?>
    </center>
</body>
</html>
