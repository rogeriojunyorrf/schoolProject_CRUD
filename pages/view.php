<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php'); 
    exit;
}
?>

<?php include '../db/db_connect.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Cadastros</title>
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
                <a href="../pages/logout.php" class="btn btn-danger">Logout</a>
            </ul>
        </div>

        <div class="container-fluid p-4">
            <h2>Modelos de Cubos Cadastrados</h2>

            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome do Modelo</th>
                        <th>Ano de Lançamento</th>
                        <th>Tipo de Cubo</th>
                        <th>Tamanho (cm)</th>
                        <th>Peso (g)</th>
                        <th>Preço (R$)</th>
                        <th>Marca</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM Cubes";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['modelName'] . "</td>";
                            echo "<td>" . $row['releaseYear'] . "</td>";
                            echo "<td>" . $row['cubeType'] . "</td>";
                            echo "<td>" . $row['cubeSize'] . "</td>";
                            echo "<td>" . $row['cubeWeight'] . "</td>";
                            echo "<td>" . $row['cubePrice'] . "</td>";
                            echo "<td>" . $row['brandName'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8'>Nenhum modelo encontrado.</td></tr>";
                    }

                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>