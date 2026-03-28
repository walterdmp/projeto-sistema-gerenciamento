
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

    if (count($erros) == 0) {
        echo "<h3 style='color: green;'>Dados da cliente validados com sucesso!</h3>";
        echo "<b>Nome:</b> $nome <br>";
        echo "<b>Telefone:</b> $telefone";
    } else {
        echo "<h3 style='color: red;'>Falha na validação:</h3><ul>";
        foreach ($erros as $erro) {
            echo "<li>$erro</li>";
        }
        echo "</ul><br><a href='form_cliente.html'>Voltar e corrigir</a>";
    }
}
?>