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
        <form action="http://localhost/PGBD_TrabFinal/html/insertjogo.php" method="post" enctype="multipart/form-data">
            Nome do Jogo:<br>
            <input type="text" name="nome"><br>
            Ano do Jogo:<br>
            <input type="text" name="ano"><br><br>
            Vendas na América do Norte:<br>
            <input type="text" name="NA_sales"><br>
            Vendas na Europa:<br>
            <input type="text" name="EU_sales"><br>
            Vendas no Japão:<br>
            <input type="text" name="JP_sales"><br>
            Outras Vendas:<br>
            <input type="text" name="other_sales"><br>
            Vendas Globais:<br>
            <input type="text" name="global_sales"><br><br>
            Selecione uma imagem: <input name="imagem" type="file" />
            <br><br>
            <?php
                include ("../php/DAO/GeneroDAO.php");
                include ("../php/DAO/PlataformaDAO.php");
                include ("../php/DAO/EditorDAO.php");
                $generoDAO = new GeneroDAO();
                $gen = $generoDAO->getTodosGeneros();
                echo "<h3>Selecione um Gênero</h3>";
                for($i=0; $i<count($gen); $i++){
                    $genNome = $gen[$i]->generoNome;
                    $idGen = $gen[$i]->idGenero;
                    if($i == 0)
                        echo "$genNome<input type=\"radio\" value=\"$idGen\" name=\"genero\" checked/><br />";
                    else
                        echo "$genNome<input type=\"radio\" value=\"$idGen\" name=\"genero\" /><br />";
                }
                echo "<a href=\"http://localhost/PGBD_TrabFinal/html/forminsert.php?val=Nome do Gênero&tabela=gen\">Inserir Novo Gênero</a>";
                $plataformaDAO = new PlataformaDAO();
                $plat = $plataformaDAO->getTotasPlataformas();
                echo "<h3>Selecione uma Plataforma</h3>";
                for($i=0; $i<count($plat); $i++){
                    $platNome = $plat[$i]->nomePlat;
                    $idPlat = $plat[$i]->idPlataforma;
                    if($i == 0)
                        echo "$platNome<input type=\"radio\" value=\"$idPlat\" name=\"plataforma\" checked/><br />";
                    else
                        echo "$platNome<input type=\"radio\" value=\"$idPlat\" name=\"plataforma\" /><br />";
                }
                echo "<a href=\"http://localhost/PGBD_TrabFinal/html/forminsert.php?val=Nome da Plataforma&tabela=plat\">Inserir Nova Plataforma</a>";
                $editorDAO = new EditorDAO();
                $editor = $editorDAO->getTodosEditores();
                echo "<h3>Selecione um Editor</h3>";
                for($i=0; $i<count($editor); $i++){
                    $editorNome = $editor[$i]->editorNome;
                    $idEditor = $editor[$i]->idEditor;
                    if($i==0)
                        echo "$editorNome<input type=\"radio\" value=\"$idEditor\" name=\"editor\" checked/><br />";
                    else
                        echo "$editorNome<input type=\"radio\" value=\"$idEditor\" name=\"editor\" /><br />";
                }
                echo "<a href=\"http://localhost/PGBD_TrabFinal/html/forminsert.php?val=Nome do Editor&tabela=ed\">Inserir Novo Editor</a>";
            ?>
            <br><input type="submit" value="Salvar">
        </form>
    </center>
</body>
</html>
