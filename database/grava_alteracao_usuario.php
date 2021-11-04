<?php
include "conexao.php"; 
//dados enviados do script altera_prod_lista.php
$idusuario=$_POST["idusuario"];

$nome=$_POST["nome"];

$endereco=$_POST["endereco"];

$cpf=$_POST["cpf"];

$fone=$_POST['fone'];

$email=$_POST['email'];

$logi= $_POST["logi"];

$senha= $_POST["senha"];


$sql="UPDATE usuario SET  nome = '$nome', endereco = '$endereco', cpf = '$cpf', fone = '$fone', email = '$email', logi = '$logi', senha = '$senha' WHERE idusuario = $idusuario;";
$resultado=pg_query($conecta,$sql);
$qtde=pg_affected_rows($resultado);
if ($qtde > 0)
{
    if($tipo=='pesquisa')
    {
        echo "<script type='text/javascript'>alert('Gravação concluída')</script>";
        echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=pesquisar_usuario.php'>";
    }
    else
    {
        echo "<script type='text/javascript'>alert('Gravação concluída')</script>";
        echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=altera_usuario.php'>";
    }
}
else
{
echo "Ocorreu algum erro<br><br>";
}
pg_close($conecta);
echo "Conexão com o banco de dados encerrada";
?>