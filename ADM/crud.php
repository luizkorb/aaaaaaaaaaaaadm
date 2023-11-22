<?php

include("conecta.php");
// Para pegar o texto dos inputs:
$cpf = isset($_POST["cpf"]) ? $_POST["cpf"] : "";

$email = isset($_POST["email"]) ? $_POST["email"] : "";
$senha = isset($_POST["senha"]) ? md5($_POST["senha"]) : "";
$nome = isset($_POST["nome"]) ? $_POST["nome"] : "";
$telefone = isset($_POST["telefone"]) ? $_POST["telefone"] : "";
$usuario = isset($_POST["usuario"]) ? $_POST["usuario"] : "";


if (isset($_POST["inserir"])) {

    $comando = $pdo->prepare("INSERT INTO cadastro_bombeiro VALUES (\"$cpf\", \"$email\", \"$senha\", \"$nome\", \"$telefone\", \"$usuario\")");
    $resultado = $comando->execute();
    header("Location: index.php");

}
if (isset($_POST["excluir"])) {

    $comando = $pdo->prepare("DELETE FROM cadastro_bombeiro WHERE cpf=\"$cpf\"");
    $resultado = $comando->execute();
    
    header("Location: index.php");

}

if (isset($_GET["alterar"])) {
    $comando = $pdo->prepare("UPDATE cadastro_bombeiro SET nome=\"$nome\", senha=\"$senha\", cpf=\"$cpf\", email=\"$email\", telefone=\"$telefone\", usuario=\"$usuario\" WHERE cpf=\"$cpf\" ");
    $resultado = $comando->execute();
    header("Location:index.php");

}

if (isset($_GET["listar"])) {
        $comando = $pdo->prepare("SELECT * FROM cadastro_bombeiro");
        $resultado = $comando->execute();

        $dados = array();

        try {
            $pdo = new PDO("mysql:host=seu_host;dbname=sua_base_de_dados", "seu_usuario", "sua_senha");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erro na conexão com o banco de dados: " . $e->getMessage());
        }
        
        // Consulta SQL para obter dados dos usuários
        $comando = $pdo->prepare("SELECT * FROM cadastro_bombeiro");
        $comando->execute();
        
        // Exibir os dados em uma tabela HTML
        echo "<table border='1'>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Senha</th>
                <th>Telefone</th>
                <th>CPF</th>
                <th>Usuário</th>
            </tr>";
        
        while ($linhas = $comando->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>
                <td>{$linhas['nome']}</td>
                <td>{$linhas['email']}</td>
                <td>{$linhas['senha']}</td>
                <td>{$linhas['telefone']}</td>
                <td>{$linhas['cpf']}</td>
                <td>{$linhas['usuario']}</td>
            </tr>";
        }
        
        echo "</table>";
}
?>