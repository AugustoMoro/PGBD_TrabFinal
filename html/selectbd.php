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
                $link = $_GET["link"];
                if($link == 0){
                    echo "<form action=\"http://localhost/PGBD_TrabFinal/html/jogostop100.php?bdtipo\" method=\"get\">";
                    echo "Banco de Dados Relacional<input type=\"radio\" value=\"0\" name=\"bdtipo\" checked/><br />";
                    echo "Banco de Dados NoSQL<input type=\"radio\" value=\"1\" name=\"bdtipo\"/><br />";
                    echo "<br><input type=\"submit\" value=\"Prosseguir\">";
                    echo "</form>";
                }
                else if($link == 1){
                    echo "<form action=\"http://localhost/PGBD_TrabFinal/html/listarplataformas.php?bdtipo\" method=\"get\">";
                    echo "Banco de Dados Relacional<input type=\"radio\" value=\"0\" name=\"bdtipo\" checked/><br />";
                    echo "Banco de Dados NoSQL<input type=\"radio\" value=\"1\" name=\"bdtipo\"/><br />";
                    echo "<br><input type=\"submit\" value=\"Prosseguir\">";
                    echo "</form>";
                }
                else if($link == 2){
                    echo "<form action=\"http://localhost/PGBD_TrabFinal/html/listargeneros.php?bdtipo\" method=\"get\">";
                    echo "Banco de Dados Relacional<input type=\"radio\" value=\"0\" name=\"bdtipo\" checked/><br />";
                    echo "Banco de Dados NoSQL<input type=\"radio\" value=\"1\" name=\"bdtipo\"/><br />";
                    echo "<br><input type=\"submit\" value=\"Prosseguir\">";
                    echo "</form>";
                }
                else if($link == 3){
                    echo "<form action=\"http://localhost/PGBD_TrabFinal/html/pesquisarjogo.php?bdtipo\" method=\"get\">";
                    echo "Banco de Dados Relacional<input type=\"radio\" value=\"0\" name=\"bdtipo\" checked/><br />";
                    echo "Banco de Dados NoSQL<input type=\"radio\" value=\"1\" name=\"bdtipo\"/><br />";
                    echo "<br><input type=\"submit\" value=\"Prosseguir\">";
                    echo "</form>";
                }
                else if($link == 4){
                    echo "<form action=\"http://localhost/PGBD_TrabFinal/html/inseriritens.php?bdtipo\" method=\"get\">";
                    echo "Banco de Dados Relacional<input type=\"radio\" value=\"0\" name=\"bdtipo\" checked/><br />";
                    echo "Banco de Dados NoSQL<input type=\"radio\" value=\"1\" name=\"bdtipo\"/><br />";
                    echo "<br><input type=\"submit\" value=\"Prosseguir\">";
                    echo "</form>";
                }
                else if($link == 5){
                    echo "<form action=\"http://localhost/PGBD_TrabFinal/html/update.php?bdtipo\" method=\"get\">";
                    echo "Banco de Dados Relacional<input type=\"radio\" value=\"0\" name=\"bdtipo\" checked/><br />";
                    echo "Banco de Dados NoSQL<input type=\"radio\" value=\"1\" name=\"bdtipo\"/><br />";
                    echo "<br><input type=\"submit\" value=\"Prosseguir\">";
                    echo "</form>";
                }
                else if($link == 6){
                    echo "<form action=\"http://localhost/PGBD_TrabFinal/html/removerjogo.php?bdtipo\" method=\"get\">";
                    echo "Banco de Dados Relacional<input type=\"radio\" value=\"0\" name=\"bdtipo\" checked/><br />";
                    echo "Banco de Dados NoSQL<input type=\"radio\" value=\"1\" name=\"bdtipo\"/><br />";
                    echo "<br><input type=\"submit\" value=\"Prosseguir\">";
                    echo "</form>";
                }

                ?>
            </center>
        </div>
    </body>
</html>