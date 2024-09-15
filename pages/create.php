<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header('Location: ../index.php'); 
    exit();
}
?>


<?php include '../db/db_connect.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="d-flex">
        <div class="bg-dark p-3" style="width: 250px; height: 100vh;">
            <h2 class="text-white">Menu</h2>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link text-white" href="create.php">Criar Cadastro</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="update.php">Atualizar Cadastro</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="delete.php">Remover Cadastro</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="view.php">Visualizar Cadastros</a>
                </li>
                <a href="../logout.php" class="btn btn-danger">Logout</a>
            </ul>
        </div>
        <div class="container-fluid p-4">
            <h2>Criar Novo Cadastro de Cubo Mágico</h2>
            <form action="create_process.php" method="POST">
                <div class="mb-3">
                    <label for="modelName" class="form-label">Nome do Modelo</label>
                    <input type="text" class="form-control" id="modelName" name="modelName" required>
                </div>
                <div class="mb-3">
                    <label for="releaseYear" class="form-label">Ano de Lançamento</label>
                    <input type="number" class="form-control" id="releaseYear" name="releaseYear" min="1974" max="2024" required>
                </div>
                <div class="mb-3">
                    <label for="cubeType" class="form-label">Tipo de Cubo (ex: 2x2)</label>
                    <input type="text" class="form-control" id="cubeType" name="cubeType" required>
                </div>
                <div class="mb-3">
                    <label for="cubeSize" class="form-label">Tamanho do Cubo (em cm)</label>
                    <input type="number" class="form-control" id="cubeSize" name="cubeSize" min="0" step="0.1" required>
                </div>
                <div class="mb-3">
                    <label for="cubeWeight" class="form-label">Peso do Cubo (em g)</label>
                    <input type="number" class="form-control" id="cubeWeight" name="cubeWeight" min="0" step="0.1" required>
                </div>
                <div class="mb-3">
                    <label for="cubePrice" class="form-label">Preço do Cubo (em R$)</label>
                    <input type="number" class="form-control" id="cubePrice" name="cubePrice" min="0" step="0.01" required>
                </div>
                <div class="mb-3">
                    <label for="brandName" class="form-label">Marca</label>
                    <input type="text" class="form-control" id="brandName" name="brandName" required>
                </div>
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
