<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8" />
<title>Grava os produtos na tabela = produto</title>
</head>
<body>
<?php
include "conexao.php"; 
$nome=$_POST['nome'];
$descricao=$_POST['descricao'];
$qtde=$_POST['qtde'];
$preco=$_POST['preco'];
$imagem=$_POST['imagem'];
$frase=$_POST['frase'];
$excluido = FALSE;
$sql="INSERT INTO produto VALUES(DEFAULT,'$nome','$descricao', $qtde, $preco, '$imagem', FALSE );";
$resultado=pg_query($conecta,$sql);
$linhas=pg_affected_rows($resultado);
if ($linhas > 0)
echo "<script type='text/javascript'>alert('Produto gravado !!!')</script>";
else	
echo "<script type='text/javascript'>alert('erro na gravação')</script>";
// Fecha a conexão com o PostgreSQL
pg_close($conecta);
echo "A conexão com o banco de dados foi encerrada!";
echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=index.html'>";
?>  
</body>
</html>
