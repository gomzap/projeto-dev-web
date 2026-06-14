<?php
require_once '../db/conexao.php';

// Verifica se um ID foi passado via GET e o valida como inteiro
if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
    
    if ($id) {
        try {
            $stmt = $pdo->prepare("DELETE FROM pedidos WHERE id = :id");
            $stmt->execute(['id' => $id]);
        } catch (PDOException $e) {
            die("Erro ao deletar: " . $e->getMessage());
        }
    }
}

header("Location: ../views/listar_pedidos.php?status=excluido");
exit;
?>