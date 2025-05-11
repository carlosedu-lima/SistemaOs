<?php
$host = "localhost";       // ou 127.0.0.1
$user = "root";            // padrão do XAMPP
$pass = "";                // padrão do XAMPP é senha em branco
$db   = "sistemaGestao";              // nome do seu banco criado no phpMyAdmin

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
  die("Erro de conexão: " . $conn->connect_error);
}
?>