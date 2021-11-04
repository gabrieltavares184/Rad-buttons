<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Alterar Usuario</title>
        </head>
    <body>
        <?php
        include "conexao.php";
            $sql="SELECT * FROM usuario WHERE excluido != TRUE ORDER BY idusuario;";
            $resultado= pg_query($conecta, $sql);
            $qtde=pg_num_rows($resultado);
        
        if ($qtde > 0)
        {
            echo "Produtos Encontrados<br><br>";
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
                
                echo "<a href='altera_usuario_lista.php?idusuario=".$linha[idusuario]."&tipo=altera'> Alterar</a><br><br>";
			
            } 
        }
        else
        {
        echo "Não foi encontrado nenhum produto !!!<br><br>";
        }
        pg_close($conecta);
        echo "A conexão com o banco de dados foi encerrada!";
        ?>    
        <a href="index.html">Home</a>
    </body>
</html>