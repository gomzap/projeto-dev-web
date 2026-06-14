<?php
// Arquivo: /actions/salvar_pedido.php
require_once '../db/conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coleta e limpa os dados enviados pelo formulário
    $nome = htmlspecialchars(trim($_POST['nome']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $telefone = htmlspecialchars(trim($_POST['telefone']));
    $assunto = htmlspecialchars(trim($_POST['assunto']));
    $quantidade = filter_var($_POST['quantidade'], FILTER_VALIDATE_INT);
    $mensagem = htmlspecialchars(trim($_POST['mensagem']));

    // Verifica se os campos principais não estão vazios
    if (empty($nome) || empty($email) || empty($mensagem)) {
        die("Erro: Por favor, preencha todos os campos obrigatórios.");
    }

    try {
        // Prepara a instrução SQL
        $sql = "INSERT INTO pedidos (nome, email, telefone, assunto, quantidade, mensagem) 
                VALUES (:nome, :email, :telefone, :assunto, :quantidade, :mensagem)";
        
        $stmt = $pdo->prepare($sql);
        
        // Substitui os parâmetros pelos valores reais
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':assunto', $assunto);
        $stmt->bindParam(':quantidade', $quantidade);
        $stmt->bindParam(':mensagem', $mensagem);
        
        // Executa a inserção
        if ($stmt->execute()) {
            // Se der certo, redireciona de volta com uma mensagem de sucesso na URL
            header("Location: ../contato.html?status=sucesso");
            exit;
        } else {
            echo "Erro ao salvar o pedido.";
        }
    } catch (PDOException $e) {
        die("Erro no banco de dados: " . $e->getMessage());
    }
} else {
    // Se tentarem acessar o arquivo diretamente sem ser por POST
    header("Location: ../contato.html");
    exit;
}
?>