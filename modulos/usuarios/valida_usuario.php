<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $senha = $_POST['senha'];
    $confirma = $_POST['confirma_senha'];

    $erros = [];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erros[] = "O formato do e-mail é inválido.";
    }

    if (strlen($senha) < 6) {
        $erros[] = "A senha deve ter pelo menos 6 caracteres.";
    }

    if ($senha !== $confirma) {
        $erros[] = "As senhas digitadas não coincidem.";
    }

    if (empty($nome)) {
        $erros[] = "O campo nome é obrigatório.";
    }

    if (empty($erros)) {
        echo "<h3 style='color: green;'>Usuário validado!</h3>";
        echo "<b>Nome:</b> $nome <br>";
        echo "<b>Login:</b> $email <br>";
        echo "<p>A senha foi confirmada e está segura.</p>";
    } else {
        echo "<h3 style='color: red;'>Erro no cadastro:</h3><ul>";
        foreach ($erros as $erro) {
            echo "<li>$erro</li>";
        }
        echo "</ul><br><a href='form_usuario.html'>Voltar</a>";
    }
}
?>