<?php
session_start();
if (!isset($_SESSION['username'])) {
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
    <title>Remover Cadastro</title>
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
            <h2>Remover Cadastro de Cubo Mágico</h2>

            <form method="GET" action="">
                <div class="mb-3">
                    <label for="selectModel" class="form-label">Selecione o Modelo para Remover:</label>
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
                    <form action="delete_process.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $model['id']; ?>">

                        <div class="mb-3">
                            <p>Você tem certeza que deseja remover o modelo <strong><?php echo $model['modelName']; ?></strong>?</p>
                        </div>
                        <button type="submit" class="btn btn-danger">Remover</button>
                        <a href="delete.php" class="btn btn-secondary">Cancelar</a>
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
