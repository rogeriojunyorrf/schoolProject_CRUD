<?php
include '../db/db_connect.php';

echo "<link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css' rel='stylesheet'>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    $sql = "DELETE FROM Cubes WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<h4>Modelo removido com sucesso!</h4>";
        echo "<a href='../index.html' class='btn btn-primary'>Voltar à Página Inicial</a>";
    } else {
        echo "Erro ao remover modelo: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
