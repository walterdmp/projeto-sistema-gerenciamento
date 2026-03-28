<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = trim($_POST['nome']);
    $telefone = trim($_POST['telefone']);

    $erros = [];

    if (empty($nome)) {
        $erros[] = "O nome da cliente não pode estar em branco.";
    }

    if (strlen($nome) < 3) {
        $erros[] = "O nome deve conter pelo menos 3 caracteres.";
    }

    if (empty($telefone)) {
        $erros[] = "O número de telefone é obrigatório para contato.";
    }

    if (!is_numeric(str_replace(['(', ')', '-', ' '], '', $telefone))) {
        $erros[] = "O telefone deve conter apenas números e símbolos de formatação.";
    }

    // --- NOVA LÓGICA DE REDIRECIONAMENTO ---

    if (count($erros) == 0) {
        // Sem erros: volta passando sucesso na URL
        header("Location: form_cliente.html?status=sucesso");
        exit();
    } else {
        // Com erros: volta passando erro na URL
        header("Location: form_cliente.html?status=erro");
        exit();
    }
}
?>