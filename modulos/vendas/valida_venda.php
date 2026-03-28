<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $cliente = trim($_POST['cliente_id']);
    $data_venda = $_POST['data_venda'];
    $valor = $_POST['valor_total'];
    $status = $_POST['status_pagamento'];

    $erros = [];

    if (empty($cliente)) {
        $erros[] = "Identificar a cliente é obrigatório.";
    }

    $hoje = date('Y-m-d');
    if ($data_venda > $hoje) {
        $erros[] = "A data da venda não pode ser maior que a data de hoje.";
    }

    if (!is_numeric($valor) || $valor <= 0) {
        $erros[] = "O valor da venda deve ser um número positivo.";
    }

    if (empty($status)) {
        $erros[] = "O status do pagamento deve ser informado.";
    }

    // --- LÓGICA DE REDIRECIONAMENTO PARA O POP-UP ---

    if (empty($erros)) {
        // Redireciona de volta passando o sucesso
        header("Location: form_venda.html?status=sucesso");
        exit();
    } else {
        // Redireciona de volta passando o erro
        header("Location: form_venda.html?status=erro");
        exit();
    }
}
?>