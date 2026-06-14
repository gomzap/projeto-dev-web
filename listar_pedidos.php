<?php
require_once '../db/conexao.php';

// READ: Busca todos os pedidos no banco ordenados pela data de criação
$stmt = $pdo->query("SELECT * FROM pedidos ORDER BY data_criacao DESC");
$pedidos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Pedidos - G-Tech</title>
    <link rel="stylesheet" href="../css/estilos.css">
    <style>
        table { width: 100%; border-collapse: collapse; margin-top: 20px; background: var(--card-bg); }
        table, th, td { border: 1px solid var(--border-color); }
        th, td { padding: 12px; text-align: left; }
        th { background-color: var(--dark-bg); color: var(--text-light); }
        .acoes a { margin-right: 10px; text-decoration: none; font-weight: bold; }
        .btn-edit { color: #007bff; }
        .btn-delete { color: #dc3545; }
    </style>
</head>
<body>
    <header>
        <div class="container header-container">
            <h1>G-Tech | Admin</h1>
            <nav>
                <ul>
                    <li><a href="../index.html">Voltar ao Site Principal</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main class="container" style="margin-top: 40px; min-height: 50vh;">
        <h2 class="section-title">Gerenciamento de Contatos / Pedidos</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th><th>Nome</th><th>Email</th><th>Telefone</th><th>Assunto</th><th>Data</th><th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pedidos as $p): ?>
                <tr>
                    <td><?= $p['id'] ?></td>
                    <td><?= htmlspecialchars($p['nome']) ?></td>
                    <td><?= htmlspecialchars($p['email']) ?></td>
                    <td><?= htmlspecialchars($p['telefone']) ?></td>
                    <td><?= htmlspecialchars($p['assunto']) ?></td>
                    <td><?= date('d/m/Y H:i', strtotime($p['data_criacao'])) ?></td>
                    <td class="acoes">
                        <a href="editar_pedido.php?id=<?= $p['id'] ?>" class="btn-edit">Editar</a>
                        <a href="../actions/deletar_pedido.php?id=<?= $p['id'] ?>" class="btn-delete" onclick="return confirm('Tem certeza que deseja excluir o registro #<?= $p['id'] ?>?')">Excluir</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</body>
</html>