<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Resultado da Pesquisa</title>
</head>
<body>
    <!-- script foi chamado de pesquisar.php -->
    <center><a href="index.html">Home</a></center>
    <?php
        include "conexao.php";
    
        $opcao = $_GET["opcao"];
        $opcampo = $_GET["opcampo"];
        $pesquisa = strtolower($_GET["pesquisa"]); //transforma texto em minúsculo
        
        if(!isset($opcao)) //se usuário não quer usar filtro
            $sql="select * from usuario
                   where excluido != TRUE
                   order by idusuario";
    
        else //se usuário escolheu um dos dois filtros
        {
            switch ($opcao)
            {
                case 1: $x="$pesquisa%"; break; //no início
                case 2: $x="%$pesquisa%"; break; //em qualquer parte
            }
            switch($opcampo)
            {
                case 1: $y="nomeusuario"; break; // pesquisa por
                case 2: $y="cpf"; break; // pesquisa por
                case 3: $y="rg"; break; // pesquisa por
                case 4: $y="telefone"; break; // pesquisa por
                case 5: $y="login"; break; // pesquisa por
            }
            $sql="select * from usuario
                where lower(".$y.") like '".$x."' and excluido != TRUE
                order by nomeusuario";
            
            /* funções sql: lower -> para transformar texto em minúsculo
            upper -> para transformar texto em maiúsculo */
        }
        echo $sql;
        echo"<br>";
        $resultado= pg_query($conecta, $sql);
        $qtde=pg_num_rows($resultado);
        
        if ($qtde > 0)
        {
            echo "usuarios encontrados<br><br>";
            while($linha = pg_fetch_array($resultado)) //ou
                //for ($cont=0; $cont < $qtde; $cont++)
            {
                //$linha=pg_fetch_array($resultado);
                //echo "Codigo: $linha[0]<br>"; //usar com índice numérico ou
                // do jeito abaixo com matriz associativa:
                echo "Id do usuario: ".$linha['idusuario']."<br>";
                echo "Nome...........:".$linha['nomeusuario']."<br>";
                echo "CPF............:".$linha['cpf']."<br>";
                echo "RG.............:".$linha['rg']."<br>";
                echo "Telefone.......:".$linha['telefone']."<br>";
                echo "Login..........:".$linha['login']."<br>";
                echo "Senha..........:".$linha['senha']."<br>";
                echo "Excluido.......:".$linha['senha']."<br>";
                echo
                "<a href='confirma_exclu_usuario.php?idusuario=$linha[0]'>
                Excluir</a>&nbsp&nbsp";
                echo
                "<a href='altera_usuario_lista.php?idusuario=$linha[0]&tipo=pesquisa'>
                Alterar</a><br><br>";
            }
        }
        else
            echo "Não foi encontrado nenhum usuario!!!";
?>
</body>
</html>