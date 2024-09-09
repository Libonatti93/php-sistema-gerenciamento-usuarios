<?php
// dashboard.php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

echo "Bem-vindo, " . htmlspecialchars($_SESSION['nome']) . "!";

// Link para editar perfil ou sair
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>
<body>
    <h1>Painel do Usuário</h1>
    <p><a href="edit_profile.php">Editar Perfil</a> | <a href="logout.php">Sair</a></p>
</body>
</html>
