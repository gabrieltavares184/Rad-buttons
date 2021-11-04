<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <title>Menu de Pesquisa</title>
</head>
<body>
    <!-- script foi chamado de menu.php -->
    <form method="GET" action="mostrar_usuario.php">
        <center>
            Pesquisar <input type="textbox" name="pesquisa"><br><br>
            Opções:
            <p><input type="radio" name="opcao" value="1" checked>Início</p>
            <p><input type="radio" name="opcao" value="2">Contendo</p>
            <br><br>
            <p><input type="radio" name="opcampo" value="1" checked>Nome</p>
            <p><input type="radio" name="opcampo" value="2">Endereco</p>
            <p><input type="radio" name="opcampo" value="3">CPF</p>
            <p><input type="radio" name="opcampo" value="4">Telefone</p>
            <p><input type="radio" name="opcampo" value="4">Email</p>
            <p><input type="radio" name="opcampo" value="5">Login</p>
            <input type="submit" value="Pesquisar">&nbsp &nbsp
            <input type="reset" value="Limpar">
        </center>
    </form>
    <center><a href="index.html">Home</a></center>
</body>
</html> 