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
                include ("../php/DAO/GeneroDAO.php");
                include ("../php/DAO/PlataformaDAO.php");
                include ("../php/DAO/EditorDAO.php");
                include ("../php/DAO/VendasDAO.php");
                $idJogo = $_GET["idjogo"];
                $imgLink = $_GET["img"];
                $anoJogo = $_GET["anojogo"];
                echo "<img src=\"" . $imgLink . "\" width=\"800\" height=\"500\" />";
                echo "<h1>Informações do jogo<h1>";
                echo "<h2>Ano:<br><font size=\"4\"> $anoJogo </font>";
                echo "<h2>Gênero:<br>";
                $generoDAO = new GeneroDAO();
                $genero = $generoDAO->getGeneroByIdJogo($idJogo);
                for($i=0; $i<count($genero); $i++){
                    echo  "<font size=\"4\">" . $genero[$i]->generoNome . "<br></font>";
                }
                $plataformaDAO = new PlataformaDAO();
                $plataforma = $plataformaDAO->getPlataformaByIdJogo($idJogo);
                echo "<h2>Plataforma:<br>";
                for($i=0; $i<count($plataforma); $i++){
                    echo  "<font size=\"4\">" . $plataforma[$i]->nomePlat . "<br></font>";
                }
                $editorDAO = new EditorDAO();
                $editor = $editorDAO->getEditorByIdJogo($idJogo);
                echo "<h2>Editor:<br>";
                for($i=0; $i<count($editor); $i++){
                    echo  "<font size=\"4\">" . $editor[$i]->editorNome . "<br></font>";
                }
                $vendasDAO = new VendasDAO();
                $vendas = $vendasDAO->getVendasByIdJogo($idJogo);
                echo "<h2>Vendas (em milhões):<br>";
                for($i=0; $i<count($vendas); $i++){
                    echo "<font size=\"4\">América do Norte: " . $vendas[$i]->NA_vendas . "<br></font>";
                    echo "<font size=\"4\">Europa: " . $vendas[$i]->EU_vendas . "<br></font>";
                    echo "<font size=\"4\">Japão: " . $vendas[$i]->JP_vendas . "<br></font>";
                    echo "<font size=\"4\">Outras Vendas: " . $vendas[$i]->outras_vendas . "<br></font>";
                    echo "<font size=\"4\">Vendas Globais: " . $vendas[$i]->vendas_globais . "<br></font>";
                    echo "<font size=\"4\">Vendas Totais: " . $vendas[$i]->vendas_totais . "<br></font>";
                }
                
                ?>
            </center>
        </div>
    </body>
</html>
