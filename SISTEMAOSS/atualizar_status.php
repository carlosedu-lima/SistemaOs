<?php
$host = "localhost";       // ou 127.0.0.1
$user = "root";            // padrão do XAMPP
$pass = "";                // padrão do XAMPP é senha em branco
$db   = "sistemaGestao";              // nome do seu banco criado no phpMyAdmin

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
  die("Erro de conexão: " . $conn->connect_error);
}

$id = $_POST['id'];
$status = $_POST['status'];

$stmt = $conn->prepare("UPDATE ordens SET status = ? WHERE id = ?");
$stmt->bind_param("si", $status, $id);

if ($stmt->execute()) {
  header("Location: producao.php");
} else {
  echo "Erro ao atualizar status.";
}

$stmt->close();
$conn->close();
?>
