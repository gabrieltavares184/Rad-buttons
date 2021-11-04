<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8" />
<title>Exclusão</title>
</head> 
<body>
<a href="index.html">Home</a>
<?php
include "conexao.php";
$sql="SELECT * FROM usuario WHERE excluido != TRUE ORDER BY idusuario;";
$resultado= pg_query($conecta, $sql);
$qtde=pg_num_rows($resultado);
if ($qtde > 0)
{
    echo "usuarios encontrados<br><br>";
    for ($cont=0; $cont < $qtde; $cont++)
    {
        $linha=pg_fetch_array($resultado);
        echo "Id do usuario: ".$linha['idusuario']."<br>";
        echo "Nome: ".$linha['nome']."<br>";
        echo "Endereco: ".$linha['endereco']."<br>";
        echo "CPF: ".$linha['cpf']."<br>";
        echo "Telefone: ".$linha['fone']."<br>";
        echo "login: ".$linha['logi']."<br>";
        echo "Senha: ".$linha['senha']."<br>";
        echo "Excluido: ".$linha['excluido']."<br>";
        echo "<a href='confirma_exclu_usuario.php?idusuario=$linha[idusuario]'>
        Excluir</a><br><br>";					   
    }
}
else
{
    echo "<script type='text/javascript'>alert('Não foi encontrado nenhum usuario !!!')</script>";
    echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=index.html'>";
}

?>    
</body>
</html>