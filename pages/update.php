<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: index.php'); 
    exit();
}
?>


<?php include '../db/db_connect.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Cadastro</title>
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
            <h2>Atualizar Cadastro de Cubo Mágico</h2>
            <form method="GET" action="">
                <div class="mb-3">
                    <label for="selectModel" class="form-label">Selecione o Modelo:</label>
                    <select class="form-select" id="selectModel" name="id" onchange="this.form.submit()">
                        <option value="" disabled selected>Escolha um modelo</option>
                        <?php
                        $sql = "SELECT id, modelName FROM Cubes";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row['id'] . "'>" . $row['modelName'] . "</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
            </form>

            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $sql = "SELECT * FROM Cubes WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $result = $stmt->get_result();
                $model = $result->fetch_assoc();

                if ($model) {
                    ?>
                    <form action="update_process.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $model['id']; ?>">

                        <div class="mb-3">
                            <label for="modelName" class="form-label">Nome do Modelo</label>
                            <input type="text" class="form-control" id="modelName" name="modelName" value="<?php echo $model['modelName']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="releaseYear" class="form-label">Ano de Lançamento</label>
                            <input type="number" class="form-control" id="releaseYear" name="releaseYear" value="<?php echo $model['releaseYear']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="cubeType" class="form-label">Tipo de Cubo (ex.: 3x3)</label>
                            <input type="text" class="form-control" id="cubeType" name="cubeType" value="<?php echo $model['cubeType']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="cubeSize" class="form-label">Tamanho do Cubo (em cm)</label>
                            <input type="number" class="form-control" id="cubeSize" name="cubeSize" step="0.1" value="<?php echo $model['cubeSize']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="cubeWeight" class="form-label">Peso do Cubo (em g)</label>
                            <input type="number" class="form-control" id="cubeWeight" name="cubeWeight" step="0.1" value="<?php echo $model['cubeWeight']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="cubePrice" class="form-label">Preço do Cubo (em R$)</label>
                            <input type="number" class="form-control" id="cubePrice" name="cubePrice" step="0.01" value="<?php echo $model['cubePrice']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="brandName" class="form-label">Marca</label>
                            <input type="text" class="form-control" id="brandName" name="brandName" value="<?php echo $model['brandName']; ?>" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Atualizar</button>
                    </form>

                    <?php
                }

                $stmt->close();
            }

            $conn->close();
            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>