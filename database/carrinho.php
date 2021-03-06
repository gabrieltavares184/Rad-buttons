<?php
/*
Extraído de:
http://www.davidchc.com.br/video-aula/php/carrinho-de-compras-com-php/
vídeo aula de:https://www.youtube.com/watch?v=CBzfcl-Qk1c

Adaptado por Profa. Ariane Scarelli para banco de dados PostgreSQL (ago/2016)
BD: TesteBD1
Tabela: produto
*/

      session_start();
       
      if(!isset($_SESSION['carrinho'])){
         $_SESSION['carrinho'] = array();
      }
       
      //adiciona produto
       
      if(isset($_GET['acao'])){
          
         //ADICIONAR CARRINHO
         if($_GET['acao'] == 'add'){
            $cdProduto = intval($_GET['cdProduto']); // Código do produto que vem da página index.php
            if(!isset($_SESSION['carrinho'][$cdProduto])){
               $_SESSION['carrinho'][$codproduto] = 1;
            }else{
               $_SESSION['carrinho'][$cdProduto] += 1;
            }
         }
          
         //REMOVER CARRINHO
         if($_GET['acao'] == 'del'){
            $codproduto = intval($_GET['cdProduto']);
            if(isset($_SESSION['carrinho'][$cdProduto])){
               unset($_SESSION['carrinho'][$cdProduto]);
            }
         }
          
         //ALTERAR QUANTIDADE
         if($_GET['acao'] == 'up'){
            if(is_array($_POST['prod'])){
               foreach($_POST['prod'] as $cdProduto => $qtde){
                  $cdProduto  = intval($cdProduto);
				  //desprezar a parte decimal
                  $qtde = intval($qtd);
                  if(!empty($qtd) && $qtde > 0){
                     $_SESSION['carrinho'][$cdProduto] = $qtde;
                  }else{
                     unset($_SESSION['carrinho'][$cdProduto]);
                  }
               }
            }
         }
       
		 // Modifica a url para remover qualquer uma das ações: add, del ou up, evita que a ação seja
		 // processada novamente caso a página seja recarregada
		 header("location:./carrinho.php");

      }
       
       
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Carrinho de Compras</title>
</head>
 
<body>
	<table>
		<caption>Carrinho de Compras</caption>
		<thead>
			<tr>
				<th width="244">Produto</th>
				<th width="79">Quantidade</th>
				<th width="89">Pre&ccedil;o</th>
				<th width="100">SubTotal</th>
				<th width="64">Remover</th>
			</tr>
		</thead>
		<form action="?acao=up" method="post">
		<tfoot>
			<tr>
			<td colspan="5"><input type="submit" value="Atualizar Carrinho" /></td>
			<tr>
			<td colspan="5"><a href="index.php">Continuar Comprando</a></td>
			<tr>
			<td colspan="5"><a href="finalizacompra.php">Finalizar Compra</a></td>
		</tfoot>
		  
		<tbody>
		   <?php
			if(count($_SESSION['carrinho']) == 0)
			{
				echo '<tr><td colspan="5">N&atilde;o h&aacute; produto no carrinho</td></tr>';
			}
			else
			{
				require("conexao.php");
				$total = 0;
				
				foreach($_SESSION['carrinho'] as $cdProduto => $qtde)
				{ // Início do FOREACH
					$sql = "SELECT * FROM produto WHERE cdProduto=$cdProduto AND	excluido IS FALSE ORDER BY descricao";
					$res = pg_query($conecta, $sql);
					$regs = pg_num_rows($res);
					if($regs>0)
					{
						$linha = pg_fetch_array($res);
						$descricao = $linha['descricao'];
						$preco = $linha['preco'];
						$sub = $preco * $qtd;
						$total += $sub;
						$preco = number_format($preco, 2, ',', '.');
						$sub = number_format($sub, 2, ',', '.');//formata para padrão brasileiro.
					}

					echo '<tr>    
						 <td>'.$descricao.'</td>
						 <td><input type="text" size="3" name="prod['.$cdProduto.']" value="'.$qtde.'" /></td>
						 <td> R$'.$preco.'</td>
						 <td> R$ '.$sub.'</td>
						 <td><a href="?acao=del&cdProduto='.$cdProduto.'">Remove</a></td>
					  	</tr>';
				}// Término do FOREACH
				 
				$total = number_format($total, 2, ',', '.');
				echo '<tr><td colspan="3">Total</td><td> R$ '.$total.'</td></tr>';
			 }//FECHA ELSE
		   ?>
		
		 </tbody>
			</form>
	</table>
 
</body>
</html>  /html; charset=iso-8859-1" />
<title>Carrinho de Com