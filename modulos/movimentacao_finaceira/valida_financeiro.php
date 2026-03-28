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

    if (empty($erros)) {
        echo "<h3 style='color: blue;'>Movimentação Financeira Validada!</h3>";
        echo "<b>Descrição:</b> $descricao <br>";
        echo "<b>Tipo:</b> " . ($tipo == "SAIDA" ? "Despesa (-)" : "Entrada (+)") . "<br>";
        echo "<b>Valor:</b> R$ " . number_format($valor, 2, ',', '.') . "<br>";
        echo "<b>Data:</b> " . date('d/m/Y', strtotime($data));
    } else {
        echo "<h3 style='color: red;'>Erro no lançamento:</h3><ul>";
        foreach ($erros as $erro) {
            echo "<li>$erro</li>";
        }
        echo "</ul><br><a href='form_financeiro.html'>Voltar</a>";
    }
}
?>