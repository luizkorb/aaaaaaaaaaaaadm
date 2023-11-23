<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Usuários</title>
    <link rel="stylesheet" href="adm.css">
</head>
<body>

<div class="cabecalho">
        <img src="menu.png" width="350px" class="menu">
    </div>    <br>
<div class="tudo">
    <h2>Inserir Dados</h2>
    <form action="crud.php" method="post" class="form">
        CPF: <input type="text" name="cpf" required><br>
        Email: <input type="email" name="email" required><br>
        Senha: <input type="password" name="senha" required><br>
        Nome: <input type="text" name="nome" required><br>
        Telefone: <input type="text" name="telefone" required><br>
        Usuário: <input type="text" name="usuario" required><br>
        <input type="submit" name="inserir" value="Inserir" class="button">
    </form>

    <h2>Excluir Dados</h2>
    <form action="crud.php" method="post">
        CPF do Bombeiro a ser excluído: <input type="cpf" name="cpf" required><br>
        <input type="submit" name="excluir" value="Excluir" class="button">
    </form>

    <h2>Alterar Dados</h2>
    <form action="crud.php" method="get">
        CPF do Bombeiro a ser alterado: <input type="text" name="cpf" required><br><br>
        Novo CPF: <br> <input type="text" name="cpf" required><br>
        Novo Email: <input type="email" name="email" required><br>
        Nova Senha: <input type="password" name="senha" required><br>
        Novo Nome: <input type="text" name="nome" required><br>
        Novo Telefone: <input type="text" name="telefone" required><br>
        Novo Usuário: <input type="text" name="usuario" required><br>
        <input type="submit" name="alterar" value="Alterar" class="button">
    </form>

    <h2>Listar Dados</h2>
    <form action="crud.php" method="get">
        <input type="submit" name="listar" value="Listar" class="button">
    </form>
</div>

<?php
// Conexão com o banco de dados
try {
    $pdo = new PDO("mysql:host=localhost;dbname=bombeirosbank", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}

// Consulta SQL para obter dados dos usuários
$comando = $pdo->prepare("SELECT * FROM cadastro_bombeiro");
$comando->execute();
?>

<!-- Exibir os dados em uma tabela HTML -->
<table border='1'>
    <tr>
        
    </tr>

<?php
    $dados = array(
        'nome' => $nome,
        'email' => $email,
        'telefone' => $telefone
        );
    echo $dados;  
?>

</table>

</body>
</html>