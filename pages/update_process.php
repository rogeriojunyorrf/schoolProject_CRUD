<?php
include '../db/db_connect.php';

echo "<link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css' rel='stylesheet'>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $modelName = $_POST['modelName'];
    $releaseYear = $_POST['releaseYear'];
    $cubeType = $_POST['cubeType'];
    $cubeSize = $_POST['cubeSize'];
    $cubeWeight = $_POST['cubeWeight'];
    $cubePrice = $_POST['cubePrice'];
    $brandName = $_POST['brandName'];

    $sql = "UPDATE Cubes SET modelName=?, releaseYear=?, cubeType=?, cubeSize=?, cubeWeight=?, cubePrice=?, brandName=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sisddssi", $modelName, $releaseYear, $cubeType, $cubeSize, $cubeWeight, $cubePrice, $brandName, $id);

    if ($stmt->execute()) {
        echo "<h4>Modelo atualizado com sucesso!<h4>";
        echo "<a href='../index.html' class='btn btn-primary'>Voltar à Página Inicial</a>";
    } else {
        echo "Erro ao atualizar modelo: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
