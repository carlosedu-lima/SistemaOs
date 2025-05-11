<?php
// Conexão com o banco de dados
$host = "localhost";
$user = "root";
$pass = "";
$db   = "sistemaGestao";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
  die("Erro de conexão: " . $conn->connect_error);
}

// Captura dos dados do formulário
$cliente        = $_POST['cliente'];
$servico        = $_POST['servico'];
$descricao      = $_POST['descricao'];
$valor_total    = $_POST['valor_total'];
$valor_entrada  = $_POST['valor_entrada'];
$valor_receber  = $_POST['valor_receber'];
$data_criacao   = date('Y-m-d H:i:s');

// Insere no banco de dados
$sql = "INSERT INTO ordens (cliente, servico, descricao, valor_total, valor_entrada, valor_receber, status, data_criacao)
        VALUES (?, ?, ?, ?, ?, ?, 'pendente', ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssddds", $cliente, $servico, $descricao, $valor_total, $valor_entrada, $valor_receber, $data_criacao);

if ($stmt->execute()) {
  echo "OS criada com sucesso!";
} else {
  echo "Erro ao criar OS: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
