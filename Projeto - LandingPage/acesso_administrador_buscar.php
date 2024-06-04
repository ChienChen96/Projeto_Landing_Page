<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['username'])) {
    header("Location: acesso_administrador_login.php");
    exit();
}

// Conexão com o banco de dados
$con = new mysqli("127.0.0.1", "root", "", "cadastro");

// Verifique a conexão
if ($con->connect_error) {
    die("Falha na conexão: " . $con->connect_error);
}

// Consulta inicial para buscar todos os usuários
$sql = "SELECT * FROM login";
$rs = $con->query($sql);

// Verifique se a consulta foi bem-sucedida
if (!$rs) {
    die("Erro na consulta: " . $con->error);
}

// Consulta de busca quando o parâmetro 'localizar' é passado via GET
if (isset($_GET["localizar"])) {
    $stmt = $con->prepare("SELECT * FROM login WHERE username LIKE ?");
    if ($stmt) {
        $search = '%' . $_GET["localizar"] . '%';
        $stmt->bind_param('s', $search);
        $stmt->execute();
        $rs = $stmt->get_result();
    } else {
        die("Erro na preparação da consulta: " . $con->error);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Consulta Usuários</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <style>
    body {
      background-image: url(./assets/plano-de-fundo.svg);
    }
    .centered-container {
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      min-height: 100vh;
      color: #ffff;
    }
    .form-container,
    .table-container {
      width: 100%;
      max-width: 600px;
      margin-bottom: 20px;
    }
    .table-container table {
      width: 100%;
      border: 1px solid #dee2e6;
      border-collapse: collapse;
      color:#ffff;
    }
    .table-container th,
    .table-container td {
      border: 1px solid #dee2e6;
      padding: 8px;
    }
    .table-container th {
      background-color: #f8f9fa;
    }
    .table-container th{
      color:#020617;
    }
    .form-container{
      margin-top:30px;
    }
    .table{
      cursor:pointer;
    }
    .logout-btn {
      position: absolute;
      top: 10px;
      right: 10px;
    }
  </style>
</head>
<body>
  <div class="container centered-container">
    <div class="form-container">
      <form method="GET" action="acesso_administrador_buscar.php" class="input-group mb-3">
        <input type="text" class="form-control" name="localizar" placeholder="Digite até 3 letras para procurar">
        <input type="submit" class="btn btn-primary" value="BUSCAR">
      </form>
    </div>

    <div class="table-container">
      <h2 class="text-center">Lista de usuários</h2>
      <table class="table text-center">
        <thead>
          <tr>
            <th>ID</th>
            <th>Usuário</th>
            <th>Opções</th>
          </tr>
        </thead>
        <tbody>
          <?php
            if ($rs) {
              while ($linha = $rs->fetch_assoc()) {
                echo "<tr>
                  <td>{$linha['id']}</td>
                  <td>{$linha['username']}</td>
                  <td>
                    <a href='acesso_administrador_alterar.php?id={$linha['id']}' class='btn btn-success'>✏️</a>
                    <a href='acesso_administrador_excluir.php?id={$linha['id']}' class='btn btn-danger'>🗑️</a>
                  </td>
                </tr>";
              }
            }
          ?>
        </tbody>
      </table>
    </div>
  </div>

  <a href="acesso_administrador_logout.php" class="btn btn-danger logout-btn">Sair</a>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
