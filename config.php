<?php
// config.php
$host = 'localhost';
$db = 'gerenciamento_usuarios';
$user = 'root'; // ajuste conforme suas configurações
$pass = ''; // ajuste conforme suas configurações

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
    exit();
}
?>
