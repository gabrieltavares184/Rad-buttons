<?php
include "conexao.php";
//dados enviados do script exclui_prod.php
$idusuario = $_GET["idusuario"];
$sql="SELECT * FROM usuario WHERE idusuario = $idusuario;";
$resultado=pg_query($conecta,$sql);
$qtde=pg_num_rows($resultado);
if ( $qtde == 0 ){echo "Registro nao encontrado  !!!<br><br>";exit;}
$linha = pg_fetch_array($resultado);
?>
<form action="exclusao_logica_usuario.php" method="POST">
Id do usuario <input type="text" name="idusuario" 
value="<?php echo $linha[idusuario]; ?>" readonly><br>
Nome <input type="text" name="nome" 
value="<?php echo $linha[nome]; ?>" readonly><br>
Endereco <input type="text" name="endereco" 
value="<?php echo $linha[endereco]; ?>" readonly><br>
CPF <input type="text" name="cpf" 
value="<?php echo $linha[cpf]; ?>" readonly><br>
Telefone <input type="text" name="fone" 
value="<?php echo $linha[fone]; ?>" readonly><br>
Email <input type="text" name="email" 
value="<?php echo $linha[email]; ?>" readonly><br>
Login <input type="text" name="logi" 
value="<?php echo $linha[logi]; ?>" readonly><br>
Senha <input type="text" name="senha" 
value="<?php echo $linha[senha]; ?>" readonly><br>
<input type="submit" value="Confirma exclusão">	
</form>
 