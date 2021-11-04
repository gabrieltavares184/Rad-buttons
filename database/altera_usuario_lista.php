<?php
include "conexao.php";
//dados enviados do script altera_prod.php
$idusuario = $_GET["idusuario"];
$tipo= $_GET["tipo"];
$sql="SELECT * FROM usuario WHERE idusuario = $idusuario;";
$resultado=pg_query($conecta,$sql);
$qtde=pg_num_rows($resultado);
if ( $qtde == 0 )
{
    echo "Usuario não encontrado  !!!<br><br>";
    exit;
}
$linha = pg_fetch_array($resultado);
if($tipo =='pesquisa')
{
    $texto="pesquisa";
}
else
{
    $texto="altera";
}
?>

<form action="grava_alteracao_usuario.php" method="post">
<h1>Alteração de Produtos </h1>
Id do Usuario <input type="number" name="idusuario" 
value="<?php echo $linha[idusuario]; ?>" readonly><br>
Nome <input type="text" name="nome" 
 value="<?php echo $linha[nomeusuario]; ?>" ><br>
endereco <input type="text" name="endereco" 
value="<?php echo $linha[endereco]; ?>" ><br>
CPF <input type="text" name="cpf" 
 value="<?php echo $linha[cpf]; ?>" ><br>
Telefone <input type="text" name="fone" 
value="<?php echo $linha[fone]; ?>" ><br>
Email <input type="text" name="email" 
value="<?php echo $linha[email]; ?>" ><br>
Login <input type="text" name="logi" 
value="<?php echo $linha[logi]; ?>" ><br>
Senha <input type="password" name="senha" 
value="<?php echo $linha[senha]; ?>" ><br>
voce está na área de: <input type="text" name="tipo" 
value="<?php echo $texto; ?>"readonly ><br>
<input type="submit" value="Gravar">
</form>