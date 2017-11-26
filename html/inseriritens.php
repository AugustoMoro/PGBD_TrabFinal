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
        <table width="100%" border="1px">
            <tr>

                <td width="25%" height="20%">Nome</td>
                <td width="25%">Ano</td>
                <td width="25%">Plataforma</td>
                <td width="25%">Genero</td>
                <td width="25%">Editor</td>
                <td width="25%">Vendas NA</td>
                <td width="25%">Vendas EU</td>
                <td width="25%">vendas JP</td>
                <td width="25%">Outras Vendas</td>
                <td width="25%">Vendas Globais</td>
                <td width="25%">Vendas Totais</td>
                
            </tr>
            <?php
            $nosql = $_GET["bdtipo"];
            echo "<form action=\"http://localhost/PGBD_TrabFinal/html/inserir.php?bdtipo\" method=\"get\">";
            echo "<input type=\"hidden\" name=\"bdtipo\" value=\"$nosql\">";
            echo "<input type=\"submit\" name=\"botao-ok\" value=\"Inserir Itens\">";
            echo "</form>";
            
            include($_SERVER['DOCUMENT_ROOT']."/PGBD_TrabFinal/php/DAO/JogoDAO.php");
            include($_SERVER['DOCUMENT_ROOT']."/PGBD_TrabFinal/php/DAO/PlataformaDAO.php");
            include($_SERVER['DOCUMENT_ROOT']."/PGBD_TrabFinal/php/DAO/GeneroDAO.php");
            include($_SERVER['DOCUMENT_ROOT']."/PGBD_TrabFinal/php/DAO/EditorDAO.php");
            include($_SERVER['DOCUMENT_ROOT']."/PGBD_TrabFinal/php/DAO/VendasDAO.php");
            $jogoDAO = new JogoDAO();
            $jogos = $jogoDAO->getTop100($nosql);
            for ($i = 0; $i < count($jogos); $i++) {
                $idJogo = $jogos[$i]->idJogo;
                $imgLink = $jogos[$i]->imgLink;
                $anoJogo = $jogos[$i]->anoJogo;
                $idPlat = $jogos[$i]->idPlataforma;
                $idGen = $jogos[$i]->idGenero;
                $idEd = $jogos[$i]->idEditor;
                $idJogo = $jogos[$i]->idJogo;
                $plataformaDAO = new PlataformaDAO();
                $plat = $plataformaDAO->getPlataformaByIdPlat($nosql,$idPlat);
                $generoDAO = new GeneroDAO();
                $gen = $generoDAO->getGeneroGyIdGen($nosql,$idGen);
                $editorDAO = new EditorDAO();
                $editor = $editorDAO->getEditorByIdEd($nosql,$idEd);
                $vendasDAO = new VendasDAO();
                $vendas = $vendasDAO->getVendasByIdJogo($nosql,$idJogo);
                echo "<tr><td><font size=\"3\">" . ($i+1) . "." . $jogos[$i]->nomeJogo . "</font></td>";
                echo "<td><font size=\"3\">" . $anoJogo . "</font></td>";
                echo "<td><font size=\"3\">" . $plat[0]->nomePlat . "</font></td>";
                echo "<td><font size=\"3\">" . $gen[0]->generoNome . "</font></td>";
                echo "<td><font size=\"3\">" . $editor[0]->editorNome . "</font></td>";
                echo "<td><font size=\"3\">" . $vendas[0]->NA_vendas . "</font></td>";
                echo "<td><font size=\"3\">" . $vendas[0]->EU_vendas . "</font></td>";
                echo "<td><font size=\"3\">" . $vendas[0]->JP_vendas . "</font></td>";
                echo "<td><font size=\"3\">" . $vendas[0]->outras_vendas . "</font></td>";
                echo "<td><font size=\"3\">" . $vendas[0]->vendas_globais . "</font></td>";
                echo "<td><font size=\"3\">" . $vendas[0]->vendas_totais . "</font></td>";
                echo "</tr>";
            }
            ?>
        </table>
    </body>
</html>
