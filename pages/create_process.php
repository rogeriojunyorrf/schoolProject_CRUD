<?php
include '../db/db_connect.php';

echo "<link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css' rel='stylesheet'>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $modelName = $_POST['modelName'];
    $releaseYear = $_POST['releaseYear'];
    $cubeType = $_POST['cubeType'];
    $cubeSize = $_POST['cubeSize'];
    $cubeWeight = $_POST['cubeWeight'];
    $cubePrice = $_POST['cubePrice'];
    $brandName = $_POST['brandName'];
    $check_sql = "SELECT * FROM Cubes WHERE modelName = '$modelName'";
    $result = $conn->query($check_sql);

    if ($result->num_rows > 0) {
        echo "<h4>Erro: O nome do modelo '$modelName' já está em uso. Por favor, escolha outro nome.</h4>";
        echo "<a href='../pages/create.php' class='btn btn-primary'>Voltar ao Formulário</a>";
    } else {
        $sql = "INSERT INTO Cubes (modelName, releaseYear, cubeType, cubeSize, cubeWeight, cubePrice, brandName)
                VALUES ('$modelName', '$releaseYear', '$cubeType', '$cubeSize', '$cubeWeight', '$cubePrice', '$brandName')";

        if ($conn->query(query: $sql) === TRUE) {
            session_start();
            $_SESSION['success_message'] = "Cubo criado com sucesso!";
            header('Location: view.php');
            exit();

        } else {
            echo "Erro ao cadastrar: " . $conn->error;
        }
    }

    $conn->close();
}
?>