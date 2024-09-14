<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Cubos Mágicos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="d-flex">
        <div class="bg-dark p-3" style="width: 250px; height: 100vh;">
            <h2 class="text-white">Menu</h2>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link text-white" href="pages/create.php">Criar Cadastro</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="pages/update.php">Atualizar Cadastro</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="pages/delete.php">Remover Cadastro</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="pages/view.php">Visualizar Cadastros</a>
                </li>   
                <a href="../pages/logout.php" class="btn btn-danger">Logout</a>
            </ul>
        </div>
        <div class="container-fluid p-4">
            <h1 class="display-4">Bem-vindo ao Gerenciador de Cubos Mágicos</h1>
            <p>Selecione uma opção no menu ao lado para começar.</p>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>