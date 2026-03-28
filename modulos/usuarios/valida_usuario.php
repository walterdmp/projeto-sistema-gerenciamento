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

    // --- LÓGICA DE REDIRECIONAMENTO PARA O POP-UP ---

    if (empty($erros)) {
        // Sem erros: volta passando sucesso na URL
        header("Location: form_usuario.html?status=sucesso");
        exit();
    } else {
        // Com erros: volta passando erro na URL
        header("Location: form_usuario.html?status=erro");
        exit();
    }
}
?>