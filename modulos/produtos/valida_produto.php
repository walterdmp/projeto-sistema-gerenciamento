<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = trim($_POST['nome_descricao']);
    $categoria = $_POST['categoria_produto'];
    $marca = trim($_POST['marca']);
    $tamanho = trim($_POST['tamanho']);
    $valor_custo = $_POST['valor_custo'];
    $valor_venda = $_POST['valor_venda'];
    $estoque = $_POST['quantidade_estoque'];

    $erros = [];

    if (empty($nome)) {
        $erros[] = "A descrição do produto é obrigatória.";
    }

    if (empty($categoria)) {
        $erros[] = "A categoria deve ser selecionada.";
    }

    if ($valor_venda <= $valor_custo) {
        $erros[] = "O valor de venda deve ser maior que o custo para garantir o lucro.";
    }

    if (!is_numeric($estoque) || $estoque < 0) {
        $erros[] = "A quantidade em estoque deve ser um número válido.";
    }

    if (empty($erros)) {
        echo "<h3>Produto validado com sucesso!</h3>";
        echo "Pronto para ser processado pelo sistema.";
    } else {
        echo "<h3>Erros encontrados:</h3><ul>";
        foreach ($erros as $erro) {
            echo "<li style='color:red;'>$erro</li>";
        }
        echo "</ul><br><a href='form_produto.html'>Voltar</a>";
    }
}
?>