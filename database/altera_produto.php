<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Alterar</title>
        </head>
    <body>
        <?php
        include "conexao.php";
            $sql="SELECT * FROM produto WHERE excluido != TRUE ORDER BY idproduto;";
            $resultado= pg_query($conecta, $sql);
            $qtde=pg_num_rows($resultado);
        
        if ($qtde > 0)
        {
            echo "Produtos Encontrados<br><br>";
            for ($cont=0; $cont < $qtde; $cont++)
            {
        
                $linha=pg_fetch_array($resultado);
                echo "Id do produto.........: ".$linha['idproduto']."<br>";
                echo "id da categoria.......: ".$linha['idcategoria']."<br>";
                echo "nome..................: ".$linha['nomeproduto']."<br>";
                echo "Preço.................: ".$linha['preco']."<br>";
                echo "excluido..............: ".$linha['excluido']."<br>";
                echo "estoque...............: ".$linha['estoque']."<br>";
                echo "Descrição.............: ".$linha['descricao']."<br>";
                echo "<img src='".$linha['imagem']."' /> <br />";
                
                
                echo "<a href='altera_produto_lista.php?idproduto=".$linha[idproduto]."&tipo=altera'> Alterar</a><br><br>"; 
            } 
        }
        else
        {
        echo "Não foi encontrado nenhum produto !!!<br><br>";
        }
        pg_close($conecta);
        echo "A conexão com o banco de dados foi encerrada!";
        ?> 
        <a href="index.html">Home</a>   
    </body>    
</html>