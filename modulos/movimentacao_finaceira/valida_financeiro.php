<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $descricao = trim($_POST['descricao']);
    $categoria = $_POST['categoria'];
    $valor = $_POST['valor'];
    $data = $_POST['data_movimentacao'];
    $tipo = $_POST['tipo'];

    $erros = [];

    if (empty($descricao) || strlen($descricao) < 5) {
        $erros[] = "A descrição deve ser detalhada (mínimo 5 caracteres).";
    }

    if (empty($categoria)) {
        $erros[] = "Selecione uma categoria financeira.";
    }

    if (!is_numeric($valor) || $valor <= 0) {
        $erros[] = "O valor deve ser um número positivo válido.";
    }

    if (empty($data)) {
        $erros[] = "A data é obrigatória.";
    }

    // --- LÓGICA DE REDIRECIONAMENTO PARA O POP-UP ---

    if (empty($erros)) {
        // Redireciona com sucesso
        header("Location: form_financeiro.html?status=sucesso");
        exit();
    } else {
        // Redireciona com erro
        header("Location: form_financeiro.html?status=erro");
        exit();
    }
}
?>