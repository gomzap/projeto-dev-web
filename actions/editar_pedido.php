<?php
require_once '../db/conexao.php';

if (!isset($_GET['id'])) {
    header("Location: ../views/listar_pedidos.php");
    exit;
}

$id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
$stmt = $pdo->prepare("SELECT * FROM pedidos WHERE id = :id");
$stmt->execute(['id' => $id]);
$pedido = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$pedido) {
    die("Pedido não encontrado.");
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Pedido - G-Tech</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
    <div class="container">
        <div class="form-section">
            <h2>Editar Pedido #<?= $pedido['id'] ?></h2>
            <p>Altere as informações abaixo e salve.</p>
            <form action="../actions/atualizar_pedido.php" method="POST" class="contato-form" onsubmit="alert('Formulário enviado com sucesso! Atualizando os dados...');">
                <!-- Campo oculto para mandar o ID no POST -->
                <input type="hidden" name="id" value="<?= $pedido['id'] ?>">
                
                <div class="form-group">
                    <label>Nome Completo:</label>
                    <input type="text" name="nome" value="<?= htmlspecialchars($pedido['nome']) ?>" required>
                </div>
                
                <div class="form-group">
                    <label>E-mail:</label>
                    <input type="email" name="email" value="<?= htmlspecialchars($pedido['email']) ?>" required>
                </div>

                <div class="form-group">
                    <label>Telefone:</label>
                    <input type="tel" name="telefone" value="<?= htmlspecialchars($pedido['telefone']) ?>" required>
                </div>

                <div class="form-group">
                    <label>Assunto:</label>
                    <input type="text" name="assunto" value="<?= htmlspecialchars($pedido['assunto']) ?>" required>
                </div>

                <div class="form-group">
                    <label>Quantidade:</label>
                    <input type="number" name="quantidade" value="<?= htmlspecialchars($pedido['quantidade']) ?>" required>
                </div>

                <div class="form-group">
                    <label>Mensagem:</label>
                    <textarea name="mensagem" rows="4" required><?= htmlspecialchars($pedido['mensagem']) ?></textarea>
                </div>

                <button type="submit" class="btn-primary">Atualizar Registro</button>
                <a href="../views/listar_pedidos.php" class="btn-secundary" style="margin-top: 15px;">Cancelar / Voltar</a>
            </form>
        </div>
    </div>
</body>
</html>