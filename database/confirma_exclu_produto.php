<?php
include "conexao.php";
//dados enviados do script exclui_prod.php
$idproduto = $_GET["idproduto"];
$sql="SELECT * FROM produto WHERE idproduto = $idproduto;";
$resultado=pg_query($conecta,$sql);
$qtde=pg_num_rows($resultado);
if ( $qtde == 0 ){echo "Registro nao encontrado  !!!<br><br>";exit;}
$linha = pg_fetch_array($resultado);
?>
<form action="exclusao_logica_produto.php" method="post">
Id do produto <input type="text" name="idproduto" 
value="<?php echo $linha[0]; ?>" readonly><br>
<?php
    include "conexao.php";
    $sql="SELECT nomecategoria, idcategoria FROM categoria where excluido != TRUE;";
    $resultado= pg_query($conecta, $sql);
    $qtde=pg_num_rows($resultado);
    if ($qtde > 0)
    {
        for($a=1; $a<=$qtde;$a++)
        {
            $linha2=pg_fetch_array($resultado);
            if($linha2[idcategoria] == $linha[idcategoria])
            echo "<p><input type='radio' name='idcategoria' value='".$linha2['idcategoria']."' checked>".$linha2['nomecategoria']."</p>";
            else
            echo "<p><input type='radio' name='idcategoria' value='".$linha2['idcategoria']."'>".$linha2['nomecategoria']."</p>";
        }
    }
?>
nome <input type="text" name="nome" 
value="<?php echo $linha[1]; ?>" readonly><br>
Preço <input type="text" name="preco" 
value="<?php echo $linha[2]; ?>" readonly><br>
Estoque <input type="number" name="estoque" 
value="<?php echo $linha[5]; ?>" readonly><br>
Descrição <input type="text" name="descricao" 
value="<?php echo $linha[3]; ?>" readonly><br>
Imagem <input type="text" name="imagem" 
value="<?php echo $linha[6]; ?>" readonly><br>
<input type="submit" value="Confirma exclusão">	
</form>
 