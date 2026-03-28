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

    if (empty($erros)) {
        echo "<h3 style='color: green;'>Venda validada com sucesso!</h3>";
        echo "<b>Cliente:</b> $cliente <br>";
        echo "<b>Data:</b> " . date('d/m/Y', strtotime($data_venda)) . "<br>";
        echo "<b>Total:</b> R$ " . number_format($valor, 2, ',', '.') . "<br>";
        echo "<b>Status:</b> $status";
    } else {
        echo "<h3 style='color: red;'>Erros na Venda:</h3><ul>";
        foreach ($erros as $erro) {
            echo "<li>$erro</li>";
        }
        echo "</ul><br><a href='form_venda.html'>Voltar</a>";
    }
}
?>