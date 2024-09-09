<?php
// edit_profile.php
require 'config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("UPDATE usuarios SET nome = :nome, senha = :senha WHERE id = :id");
    $stmt->execute([
        ':nome' => $nome,
        ':senha' => $senha,
        ':id' => $_SESSION['user_id']
    ]);

    echo "Perfil atualizado com sucesso!";
}

// Obter informações atuais do usuário
$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
$stmt->execute([':id' => $_SESSION['user_id']]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Perfil</title>
</head>
<body>
    <h1>Editar Perfil</h1>
    <form method="POST" action="">
        <label for="nome">Nome:</label><br>
        <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($user['nome']); ?>" required><br><br>
        <label for="senha">Nova Senha:</label><br>
        <input type="password" id="senha" name="senha" required><br><br>
        <button type="submit">Atualizar</button>
    </form>
</body>
</html>
