<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Resultado da Pesquisa</title>
</head>
<body>
    <!-- script foi chamado de pesquisar.php -->
    <center><a href="index.html">Home</a></center>
    <?php
        include "conexao.php";
        $minimo= $_GET["minimo"];
        $maximo= $_GET["maximo"];
        $categoria= strtolower($_GET["categoria"]);
        $opcao = $_GET["opcao"];
        $pesquisa = strtolower($_GET["pesquisa"]); //transforma texto em minúsculo
        
        function minimo($minimo)
        {
            if($minimo > 0)
            {
                return " and p.preco > ".$minimo;
            }
            else
            {
                return '';
            }
        }
        function maximo($maximo)
        {
            
            if($maximo > 0)
            {
                return " and p.preco < ".$maximo;
            }
            else
            {
                return '';
            }
        }
        function categoria($categoria)
        {
            if($categoria > 0)
            {
               return " and c.idcategoria = ".$categoria; 
            }   
            else
            {
                return '';
            }
        }
        if(!isset($opcao)) //se usuário não quer usar filtro
        {
            $sql="select * from produto p, categoria c
            where c.idcategoria = p.idcategoria and p.excluido != TRUE";
            $sql1=minimo($minimo,$sql);
            $sql2=maximo($maximo,$sql);
            $sql3=categoria($categoria,$sql);
            $sql4=";";
            $sqlfinal=$sql.$sql1.$sql2.$sql3.$sql4;
        }
        else //se usuário escolheu um dos dois filtros
        {
            switch ($opcao)
            {
                case 1: $x="$pesquisa%"; break; //no início
                case 2: $x="%$pesquisa%"; break; //em qualquer parte
            }
            
            $sql="select * from produto p, categoria c
                where c.idcategoria = p.idcategoria and lower(p.nomeproduto) like '$x' and p.excluido != TRUE";
            $sql1=minimo($minimo,$sql);
            $sql2=maximo($maximo,$sql);
            $sql3=categoria($categoria,$sql);
            $sql4=";";
            $sqlfinal=$sql.$sql1.$sql2.$sql3.$sql4;
        }
        echo "<br>";
        echo $sqlfinal;
        echo"<br>";
        $resultado= pg_query($conecta, $sqlfinal);
        $qtde=pg_num_rows($resultado);
        if ($qtde > 0)
        {
            echo "Produtos encontrados<br><br>";
            while($linha = pg_fetch_array($resultado))
            {
                echo "Id do produto:........:".$linha['idproduto']."<br>";
                echo "Id da categoria:......:".$linha['idcategoria']."<br>";
                echo "nome:.................:".$linha['nomeproduto']."<br>";
                echo "Preço:................:".$linha['preco']."<br>";
                echo "excluido:.............:".$linha['excluido']."<br>";
                echo "estoque:..............:".$linha['estoque']."<br>";
                echo "descricao:............:".$linha['descricao']."<br>";
                echo "<img src='image/".$linha['imagem']."' /> <br />";
                echo
                "<a href='confirma_exclu_produto.php?idproduto=$linha[0]'>
                Excluir</a>&nbsp&nbsp";
                echo
                "<a href='altera_produto_lista.php?idproduto=$linha[0]&tipo=pesquisa'>
                Alterar</a><br><br>";
            }
        }
        else
            echo "Não foi encontrado nenhum produto!!!";
?>
</body>
</html>