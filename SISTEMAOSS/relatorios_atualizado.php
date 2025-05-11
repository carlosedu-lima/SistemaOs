<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "sistemaGestao";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
  die("Erro de conexão: " . $conn->connect_error);
}

// Se o formulário foi enviado
if (isset($_POST['start_date']) && isset($_POST['end_date'])) {
    // Obtemos as datas de início e fim do formulário
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    // Consulta com filtro de data
    $query = "SELECT * FROM ordens WHERE status = 'concluído' AND data_criacao BETWEEN '$start_date' AND '$end_date' ORDER BY id DESC";
    $result = $conn->query($query);
} else {
    // Se não foi enviado filtro, pegamos todas as ordens concluídas
    $result = $conn->query("SELECT * FROM ordens WHERE status = 'concluído' ORDER BY id DESC");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Relatório de Ordens Concluídas</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f4f6f8;
      margin: 0;
      padding: 20px;
    }
<style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f4f6f8;
      margin: 0;
      padding: 0;
    }

    header {
      background-color: #007BFF;
      padding: 15px 0;
      text-align: center;
      color: white;
    }

    nav {
      background-color: #333;
      display: flex;
      justify-content: center;
      padding: 10px 0;
    }

    nav a {
      color: white;
      text-decoration: none;
      padding: 10px 20px;
      font-size: 16px;
      transition: background-color 0.3s ease;
    }

    nav a:hover {
      background-color: #0056b3;
    }

    main {
      padding: 20px;
    }

    h1, h2 {
      color: #333;
    }

    .content {
      margin-top: 30px;
    }
    h1, h2 {
      color: #333;
      margin-top: 40px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background-color: #fff;
      box-shadow: 0 0 10px rgba(0,0,0,0.05);
      border-radius: 6px;
      overflow: hidden;
      margin-bottom: 40px;
    }

    th, td {
      padding: 12px 15px;
      border-bottom: 1px solid #eee;
      text-align: left;
    }

    th {
      background-color: #007BFF;
      color: white;
    }

    tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    form {
      background: #fff;
      padding: 20px;
      border-radius: 6px;
      box-shadow: 0 0 10px rgba(0,0,0,0.05);
      max-width: 500px;
      margin-bottom: 40px;
    }

    label {
      font-weight: bold;
      display: block;
      margin-top: 10px;
    }

    input, button {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      font-size: 16px;
    }

    button {
      background-color: #007BFF;
      color: white;
      border: none;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    button:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
 <nav>
    <a href="criar_os.html">Criar OS</a>
    <a href="producao.php">Produção</a>
    <a href="relatorios_atualizado.php">Relatórios</a>
  </nav>

  <main class="content">
    <h2>Bem-vindo ao Sistema!</h2>
    <p>Aqui você pode gerenciar ordens de serviço, acompanhar a produção e gerar relatórios.</p>
  </main>
  <h1>Relatório de Ordens Concluídas</h1>

  <!-- Formulário de Filtro por Período -->
  <h2>Filtrar por Período</h2>
  <form method="post" action="">
    <label for="start_date">Data de Início:</label>
    <input type="date" name="start_date" required>

    <label for="end_date">Data de Fim:</label>
    <input type="date" name="end_date" required>

    <button type="submit">Filtrar</button>
  </form>

  <!-- Tabela de Relatório -->
  <table>
    <tr>
      <th>ID</th><th>Cliente</th><th>Serviço</th><th>Descrição</th>
      <th>Valor Total</th><th>Entrada</th><th>À Receber</th><th>Data</th>
    </tr>
    <?php while($row = $result->fetch_assoc()): ?>
    <tr>
      <td><?= $row['id'] ?></td>
      <td><?= $row['cliente'] ?></td>
      <td><?= $row['servico'] ?></td>
      <td><?= $row['descricao'] ?></td>
      <td>R$ <?= number_format($row['valor_total'], 2, ',', '.') ?></td>
      <td>R$ <?= number_format($row['valor_entrada'], 2, ',', '.') ?></td>
      <td>R$ <?= number_format($row['valor_receber'], 2, ',', '.') ?></td>
      <td><?= date('d/m/Y H:i', strtotime($row['data_criacao'])) ?></td>
    </tr>
    <?php endwhile; ?>
  </table>

  <?php $conn->close(); ?>

</body>
</html>
