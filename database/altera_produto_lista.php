<?php
include "conexao.php";
//dados enviados do script altera_prod.php
$idproduto = $_GET["idproduto"];
$tipo= $_GET["tipo"];
$sql="SELECT * FROM produto WHERE idproduto = $idproduto;";
$resultado=pg_query($conecta,$sql);
$qtde=pg_num_rows($resultado);
if ( $qtde == 0 )
{
echo "Produto não encontrado  !!!<br><br>";
exit;
}
$linha = pg_fetch_array($resultado);
if($tipo=='pesquisa')
{
 $texto="pesquisa";
}
else
{
 $texto="altera";
}
?>

<form action="grava_alteracao_produto.php" method="post">
<h1>Alteração de Produtos </h1>
Id do Produto <input type="number" name="idproduto" 
value="<?php echo $linha[idproduto]; ?>" readonly><br>
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
Nome <input type="text" name="nome" 
 value="<?php echo $linha[nomeproduto]; ?>" ><br>
Preço <input type="number" name="preco" 
 value="<?php echo $linha[preco]; ?>" ><br>
Estoque <input type="number" name="estoque" 
value="<?php echo $linha[estoque]; ?>" ><br>
Descrição <input type="text" name="descricao" 
value="<?php echo $linha[descricao]; ?>" ><br>
Imagem <input type="text" name="imagem" 
value="<?php echo $linha[imagem]; ?>" ><br>
voce está na área de: <input type="text" name="tipo" 
value="<?php echo $texto; ?>"readonly ><br>
<input type="submit" value="Gravar">
</form>