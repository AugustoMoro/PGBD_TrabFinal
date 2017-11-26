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
        $valor = NULL;
        $tipoBusca = NULL;
        $nosql = $_GET["bdtipo"];
        if (isset($_GET["val"])) {
            $valor = $_GET["val"];
        }
        if (isset($_GET["tipobusca"])) {
            $tipoBusca = $_GET["tipobusca"];
        }
        //echo $nosql;
        echo "<form action=\"http://localhost/PGBD_TrabFinal/html/pesquisarjogo.php?&val&tipobusca&bdtipo\" method=\"get\">";
        echo "Valor:<br>";
        echo "<input type=\"text\" name=\"val\"><br>";
        echo "<br>Pesquisar por:<br>";
        echo "<input type=\"hidden\" name=\"bdtipo\" value=\"$nosql\">";
        echo "<input type=\"radio\" name=\"tipobusca\" value=\"nome\" checked> Nome do Jogo <br>";
        echo "<input type=\"radio\" name=\"tipobusca\" value=\"ano\"> Ano do Jogo<br>";
        echo "<input type=\"radio\" name=\"tipobusca\" value=\"genero\"> Gênero do Jogo<br>";
        echo "<input type=\"submit\" name=\"botao-ok\" value=\"Pesquisar\">";
        echo "</form>";

        if (strlen($valor) > 0) {
            include($_SERVER['DOCUMENT_ROOT']."/PGBD_TrabFinal/php/DAO/JogoDAO.php");
            $jogoDAO = new JogoDAO();
            $jogos = array();
            if ($tipoBusca == "nome") {
                $jogos = $jogoDAO->pesquisaByNomeJogo($nosql,$valor);
            }
            else if ($tipoBusca == "genero"){
                $jogos = $jogoDAO->pesquisaByGeneroJogo($nosql,$valor);
            }
            else if($tipoBusca == "ano"){
                $jogos = $jogoDAO->pesquisaByAnoJogo($nosql,$valor);
            }
            for ($i = 0; $i < count($jogos); $i++) {
                $idJogo = $jogos[$i]->idJogo;
                $imgLink = $jogos[$i]->imgLink;
                $anoJogo = $jogos[$i]->anoJogo;
                echo "<h2> " . ($i + 1) . " - " . $jogos[$i]->nomeJogo . " (" . $anoJogo . ")" . "<h2><br>";
                echo "<img src=\"" . $imgLink . "\" width=\"500\" height=\"300\" />";
                echo "<a href=\"http://localhost/PGBD_TrabFinal/html/informacoesjogo.php?idjogo=$idJogo&img=$imgLink&anojogo=$anoJogo&bdtipo=$nosql\"><br><font size=\"4\"> Informações do Jogo </font></a>";
                echo "<br><br><br>";
            }
        }
        ?>
    </center>
</body>
</html>
