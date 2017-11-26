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

                echo "<form action=\"http://localhost/PGBD_TrabFinal/html/insertjogo.php\" method=\"post\" enctype=\"multipart/form-data\">";
                echo "Nome do Jogo:<br>";
                echo "<input type=\"hidden\" name=\"bdtipo\" value=\"$nosql\">";
                echo "<input type=\"text\" name=\"nome\"><br>";
                echo "Ano do Jogo:<br>";
                echo "<input type=\"text\" name=\"ano\"><br><br>";
                echo "Vendas na América do Norte:<br>";
                echo "<input type=\"text\" name=\"NA_sales\"><br>";
                echo "Vendas na Europa:<br>";
                echo "<input type=\"text\" name=\"EU_sales\"><br>";
                echo "Vendas no Japão:<br>";
                echo "<input type=\"text\" name=\"JP_sales\"><br>";
                echo "Outras Vendas:<br>";
                echo "<input type=\"text\" name=\"other_sales\"><br>";
                echo "Vendas Globais:<br>";
                echo "<input type=\"text\" name=\"global_sales\"><br><br>";
                echo "Selecione uma imagem: <input name=\"imagem\" type=\"file\" />";
                echo "<br><br>";
                
            
                include($_SERVER['DOCUMENT_ROOT']."/PGBD_TrabFinal/php/DAO/GeneroDAO.php");
                include($_SERVER['DOCUMENT_ROOT']."/PGBD_TrabFinal/php/DAO/PlataformaDAO.php");
                include($_SERVER['DOCUMENT_ROOT']."/PGBD_TrabFinal/php/DAO/EditorDAO.php");
                $generoDAO = new GeneroDAO();
                $gen = $generoDAO->getTodosGeneros($nosql);
                echo "<h3>Selecione um Gênero</h3>";
                for($i=0; $i<count($gen); $i++){
                    $genNome = $gen[$i]->generoNome;
                    $idGen = $gen[$i]->idGenero;
                    if($i == 0)
                        echo "$genNome<input type=\"radio\" value=\"$idGen\" name=\"genero\" checked/><br />";
                    else
                        echo "$genNome<input type=\"radio\" value=\"$idGen\" name=\"genero\" /><br />";
                }
                $plataformaDAO = new PlataformaDAO();
                $plat = $plataformaDAO->getTotasPlataformas($nosql);
                echo "<h3>Selecione uma Plataforma</h3>";
                for($i=0; $i<count($plat); $i++){
                    $platNome = $plat[$i]->nomePlat;
                    $idPlat = $plat[$i]->idPlataforma;
                    if($i == 0)
                        echo "$platNome<input type=\"radio\" value=\"$idPlat\" name=\"plataforma\" checked/><br />";
                    else
                        echo "$platNome<input type=\"radio\" value=\"$idPlat\" name=\"plataforma\" /><br />";
                }
                $editorDAO = new EditorDAO();
                $editor = $editorDAO->getTodosEditores($nosql);
                echo "<h3>Selecione um Editor</h3>";
                for($i=0; $i<count($editor); $i++){
                    $editorNome = $editor[$i]->editorNome;
                    $idEditor = $editor[$i]->idEditor;
                    if($i==0)
                        echo "$editorNome<input type=\"radio\" value=\"$idEditor\" name=\"editor\" checked/><br />";
                    else
                        echo "$editorNome<input type=\"radio\" value=\"$idEditor\" name=\"editor\" /><br />";
                }
            ?>
            <br><input type="submit" value="Salvar">
        </form>
    </center>
</body>
</html>
