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

    // --- NOVA LÓGICA DE REDIRECIONAMENTO ---

    if (empty($erros)) {
        // Se não houver erros, volta para o formulário passando "?status=sucesso" na URL
        header("Location: form_produto.html?status=sucesso");
        exit(); // O exit garante que o PHP pare de processar imediatamente após o redirecionamento
    } else {
        // Se houver erros, volta para o formulário passando "?status=erro" na URL
        header("Location: form_produto.html?status=erro");
        exit();
    }
}
?>