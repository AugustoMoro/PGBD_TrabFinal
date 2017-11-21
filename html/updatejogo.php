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
        include ("../php/DAO/PlataformaDAO.php");
        include ("../php/DAO/EditorDAO.php");
        include ("../php/DAO/VendasDAO.php");
        include ("../php/DAO/JogoDAO.php");
        $idJogo = $_GET["idjogo"];
        $imgLink = $_GET["img"];
        $anoJogo = $_GET["anojogo"];
        $nomeJogo = $_GET["nomejogo"];
        echo "<img src=\"" . $imgLink . "\" width=\"800\" height=\"500\" />";
        echo "<form action=\"http://localhost/PGBD_TrabFinal/html/updateitens.php\" method=\"post\">";
        echo "<h2>Nome:</h2>";
        echo "<input type=\"hidden\" name=\"idjogo\" value=\"$idJogo\">";
        echo "<input type=\"text\" name=\"nome\" style=\"font-family: Tahoma; font-size: 16px\" value=\"$nomeJogo\">";
        echo "<h2>Ano:</h2>";
        echo "<input type=\"text\" name=\"ano\"  size=\"5\" style=\"font-family: Tahoma; font-size: 16px\" value=\"$anoJogo\">";
        $generoDAO = new GeneroDAO();
        $gen = $generoDAO->getTodosGeneros();
        $genJogo = $generoDAO->getGeneroByIdJogo($idJogo);
        echo "<br><h3>Gênero:</h3>";
        for ($i = 0; $i < count($gen); $i++) {
            $genNome = $gen[$i]->generoNome;
            $idGen = $gen[$i]->idGenero;
            $selectedGen = $genJogo[0]->idGenero;
            if ($idGen == $selectedGen)
                echo "$genNome<input type=\"radio\" value=\"$idGen\" name=\"genero\" checked/><br />";
            else
                echo "$genNome<input type=\"radio\" value=\"$idGen\" name=\"genero\"/><br />";
        }
        echo "<br><h3>Plataforma:</h3>";
        $plataformaDAO = new PlataformaDAO();
        $plat = $plataformaDAO->getTotasPlataformas();
        $platJogo = $plataformaDAO->getPlataformaByIdJogo($idJogo);
        for ($i = 0; $i < count($plat); $i++) {
            $platNome = $plat[$i]->nomePlat;
            $idPlat = $plat[$i]->idPlataforma;
            $selectedPlat = $platJogo[0]->nomePlat;
            if ($platNome == $selectedPlat)
                echo "$platNome<input type=\"radio\" value=\"$idPlat\" name=\"plataforma\" checked/><br />";
            else
                echo "$platNome<input type=\"radio\" value=\"$idPlat\" name=\"plataforma\"/><br />";
        }
        echo "<br><h3>Editor:</h3>";
        $editorDAO = new EditorDAO();
        $ed = $editorDAO->getTodosEditores();
        $edJogo = $editorDAO->getEditorByIdJogo($idJogo);
        for($i=0; $i<count($ed); $i++){
            $edNome = $ed[$i]->editorNome;
            $idEd = $ed[$i]->idEditor;
            $selectedEd = $edJogo[0]->idEditor;
            if($idEd == $selectedEd)
                echo "$edNome<input type=\"radio\" value=\"$idEd\" name=\"editor\" checked/><br />";
            else
                echo "$edNome<input type=\"radio\" value=\"$idEd\" name=\"editor\"/><br />";
        }
        echo "<h2>Vendas (em milhões):</h2>";
        $vendasDAO = new VendasDAO();
        $venda = $vendasDAO->getVendasByIdJogo($idJogo);
        $NA_vendas = $venda[0]->NA_vendas;
        $EU_vendas = $venda[0]->EU_vendas;
        $JP_vendas = $venda[0]->JP_vendas;
        $outras_vendas = $venda[0]->outras_vendas;
        $vendas_globais = $venda[0]->vendas_globais;
        $vendas_totais = $venda[0]->vendas_totais;
        echo "<h3>América do Norte:<h3>";
        echo "<input type=\"text\" name=\"NA_vendas\" style=\"font-family: Tahoma; font-size: 16px\" value=\"$NA_vendas\">";
        echo "<h3>Europa:<h3>";
        echo "<input type=\"text\" name=\"EU_vendas\" style=\"font-family: Tahoma; font-size: 16px\" value=\"$EU_vendas\">";
        echo "<h3>Japão:<h3>";
        echo "<input type=\"text\" name=\"JP_vendas\" style=\"font-family: Tahoma; font-size: 16px\" value=\"$JP_vendas\">";
        echo "<h3>Outras Vendas:<h3>";
        echo "<input type=\"text\" name=\"outras_vendas\" style=\"font-family: Tahoma; font-size: 16px\" value=\"$outras_vendas\">";
        echo "<h3>Vendas Globais:<h3>";
        echo "<input type=\"text\" name=\"vendas_globais\" style=\"font-family: Tahoma; font-size: 16px\" value=\"$vendas_globais\">";
        echo "<br><br><input type=\"submit\" value=\"Salvar\">";
        echo "</form>";
        ?>
    </center>
</body>
</html>
