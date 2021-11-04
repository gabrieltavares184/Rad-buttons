<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8" />
<title>Cadastro de Usu�rio = usuario</title>
</head>
<body>
<?php
include "conexao.php"; 
$nome=$_POST['nome'];
$endereco=$_POST['endereco'];
$cpf=$_POST['cpf'];
$fone=$_POST['fone'];
$email=$_POST['email'];
$logi=$_POST['logi'];
$senha=$_POST['senha'];
$adm = FALSE;
$excluido = FALSE;
$dataexclusao=$_POST['data'];
$sql="INSERT INTO usuario VALUES(DEFAULT,'$nome','$endereco','$cpf','$fone','$email', '$logi','$senha', FALSE, FALSE );";
$resultado=pg_query($conecta,$sql);
$linhas=pg_affected_rows($resultado);
if ($linhas > 0)
echo "<script type='text/javascript'>alert('Usuario Cadastrado !!!')</script>";
else	
echo "<script type='text/javascript'>alert('erro na gravação')</script>";
// Fecha a conexão com o PostgreSQL
pg_close($conecta);
echo "A conexão com o banco de dados foi encerrada!";
echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=index.html'>";
?>  
</body>
</html>
