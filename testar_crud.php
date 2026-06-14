<?php
echo "<h1>Teste de Integração - CRUD Pedidos</h1>";

// 1. Testando Conexão
echo "<h2>1. Testando Conexão com o Banco...</h2>";
require_once 'db/conexao.php';
if (isset($pdo)) {
    echo "<p style='color:green;'>✔ Conexão com o banco de dados 'gtech_db' estabelecida com sucesso!</p>";
} else {
    die("<p style='color:red;'>✖ Falha na conexão com o banco de dados.</p>");
}

// 2. Testando Inserção (Create)
echo "<h2>2. Testando Inserção (Create)...</h2>";
$sqlInsert = "INSERT INTO pedidos (nome, email, telefone, assunto, quantidade, mensagem) 
              VALUES ('Usuário Teste', 'teste@gtech.com', '(11) 99999-9999', 'Teste Automatizado', 2, 'Mensagem de teste automatizado.')";
$pdo->exec($sqlInsert);
$lastId = $pdo->lastInsertId();
if ($lastId) {
    echo "<p style='color:green;'>✔ Pedido de teste inserido com sucesso! (ID gerado: $lastId)</p>";
} else {
    die("<p style='color:red;'>✖ Falha ao inserir o pedido de teste.</p>");
}

// 3. Testando Leitura (Read)
echo "<h2>3. Testando Leitura (Read)...</h2>";
$stmt = $pdo->query("SELECT * FROM pedidos WHERE id = $lastId");
$pedido = $stmt->fetch(PDO::FETCH_ASSOC);
if ($pedido && $pedido['nome'] === 'Usuário Teste') {
    echo "<p style='color:green;'>✔ Pedido lido do banco de dados com sucesso! (Nome retornado: " . htmlspecialchars($pedido['nome']) . ")</p>";
} else {
    die("<p style='color:red;'>✖ Falha ao ler o pedido recém-criado.</p>");
}

// 4. Testando Atualização (Update)
echo "<h2>4. Testando Atualização (Update)...</h2>";
$sqlUpdate = "UPDATE pedidos SET assunto = 'Teste Atualizado', quantidade = 5 WHERE id = $lastId";
$pdo->exec($sqlUpdate);
$stmtUpdate = $pdo->query("SELECT assunto, quantidade FROM pedidos WHERE id = $lastId");
$pedidoAtualizado = $stmtUpdate->fetch(PDO::FETCH_ASSOC);
if ($pedidoAtualizado && $pedidoAtualizado['assunto'] === 'Teste Atualizado' && $pedidoAtualizado['quantidade'] == 5) {
    echo "<p style='color:green;'>✔ Pedido modificado e salvo com sucesso!</p>";
} else {
    die("<p style='color:red;'>✖ Falha ao atualizar os dados do pedido.</p>");
}

// 5. Testando Exclusão (Delete)
echo "<h2>5. Testando Exclusão (Delete)...</h2>";
$sqlDelete = "DELETE FROM pedidos WHERE id = $lastId";
$pdo->exec($sqlDelete);
$stmtDelete = $pdo->query("SELECT * FROM pedidos WHERE id = $lastId");
if (!$stmtDelete->fetch(PDO::FETCH_ASSOC)) {
    echo "<p style='color:green;'>✔ Pedido de teste excluído permanentemente com sucesso!</p>";
} else {
    die("<p style='color:red;'>✖ Falha ao tentar remover o pedido de teste.</p>");
}

echo "<hr><h2>Teste Finalizado! 🎉</h2>";
echo "<p>Se todos os passos estiverem com o aviso <span style='color:green;'>✔ verde</span>, a integração com seu banco de dados e as operações de CRUD estão funcionando 100%.</p>";