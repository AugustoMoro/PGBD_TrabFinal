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
        <form action="processarFormulario.php" method="GET">
            <p>Blablabla pergunta.... blablabla</p>
            Opção 1<input type="radio" value="1" name="opcao" /><br />
            Opção 2<input type="radio" value="2" name="opcao" /><br />
            Opção 3<input type="radio" value="3" name="opcao" /><br />
            Opção 4<input type="radio" value="4" name="opcao" /><br />
            Opção 5<input type="radio" value="5" name="opcao" /><br />


            <p>Pergunta multipla escolha...</p>
            <input type="checkbox" class="checkbox" value="caucasiano" name="escolhas[]" />Caucasiano<br />
            <input type="checkbox" class="checkbox" value="amarelo" name="escolhas[]" />Amarelo<br />
            <input type="checkbox" class="checkbox" value="preto" name="escolhas[]" />Preto<br />
            <input type="checkbox" class="checkbox" value="indio" name="escolhas[]" />Indio<br />
            <input type="checkbox" class="checkbox" value="barriga_verde" name="escolhas[]" />Barriga Verde<br />

            <input type="submit" class="submit" value="ENVIA POHA!" name="" />

        </form>

    </body>
</html>
