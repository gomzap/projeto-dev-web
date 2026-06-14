<?php
require_once '../db/conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = filter_var($_POST['id'], FILTER_VALIDATE_INT);
    $nome = htmlspecialchars(trim($_POST['nome']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $telefone = htmlspecialchars(trim($_POST['telefone']));
    $assunto = htmlspecialchars(trim($_POST['assunto']));
    $quantidade = filter_var($_POST['quantidade'], FILTER_VALIDATE_INT);
    $mensagem = htmlspecialchars(trim($_POST['mensagem']));

    if ($id && !empty($nome) && !empty($email)) {
        try {
            $sql = "UPDATE pedidos SET nome = :nome, email = :email, telefone = :telefone, assunto = :assunto, quantidade = :quantidade, mensagem = :mensagem WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            
            $stmt->execute([
                ':nome' => $nome,
                ':email' => $email,
                ':telefone' => $telefone,
                ':assunto' => $assunto,
                ':quantidade' => $quantidade,
                ':mensagem' => $mensagem,
                ':id' => $id
            ]);
        } catch (PDOException $e) {
            die("Erro ao atualizar: " . $e->getMessage());
        }
    }
}
header("Location: ../views/listar_pedidos.php?status=sucesso");
exit;
?>