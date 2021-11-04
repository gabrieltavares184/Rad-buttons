<?php
include "conexao.php";

//dados enviados do script exclui_prod_chamada_confirma_exclusao_logica.php
$idusuario = $_POST['idusuario'];

$sql="update usuario set excluido = TRUE WHERE idusuario = $idusuario";
//inserida a data de exclusao do usuario para documentação

$resultado=pg_query($conecta,$sql);
$qtde=pg_affected_rows($resultado);
if ($qtde > 0 )
{
echo "<script type='text/javascript'>alert('Exclusão OK !!!')</script>";
echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=exclui_usuario.php'>";
}
else
{
echo "Erro na exclusão !!!<br>";
echo "<a href='exclui_usuario.php'>Voltar</a>";
}
?>
 