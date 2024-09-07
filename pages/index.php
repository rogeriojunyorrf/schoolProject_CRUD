<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php'); 
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Bem-vindo, <?php echo $_SESSION['user']; ?>!</h1>
        <p>Você está logado no sistema.</p>
        <a href='../index.html' class='btn btn-primary'>Voltar à Página Inicial</a>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
