<?php
include "conexao.php"; 
//dados enviados do script altera_prod_lista.php
$idproduto=$_POST["idproduto"];

$tipo= $_POST['tipo'];

$idcategoria=$_POST["idcategoria"];

$nome=$_POST["nome"];

$preco=$_POST["preco"];

$descricao=$_POST['descricao'];

$estoque= $_POST["estoque"];

$imagem=$_POST['imagem']; 

$sql="UPDATE produto SET idcategoria = $idcategoria,nomeproduto= '$nome',
preco = $preco, estoque = $estoque, imagem = '$imagem', descricao = '$descricao' WHERE idproduto = $idproduto;";
$resultado=pg_query($conecta,$sql);
$qtde=pg_affected_rows($resultado);
if ($qtde > 0)
{
    if($tipo=='pesquisa')
    {
        echo "<script type='text/javascript'>alert('Gravação concluída')</script>";
        echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=pesquisar_produto.php'>";
    }
    else
    {
        echo "<script type='text/javascript'>alert('Gravação concluída')</script>";
        echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=altera_produto.php'>";
    }
}
else
{
echo "Ocorreu algum erro<br><br>";
}
pg_close($conecta);
echo "Conexão com o banco de dados encerrada";
?>