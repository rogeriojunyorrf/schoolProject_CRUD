<?php
session_start();
include 'db/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM Users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if ($password === $user['password']) {
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $user['role'];  

            if ($user['role'] === 'admin') {
                header('Location: pages/view.php'); 
            } elseif ($user['role'] === 'viewer') {
                header('Location: pages/view_only.php'); 
            } else {
                $error = "Função de usuário desconhecida!";
            }
            exit();
        } else {
            $error = "Senha incorreta!";
        }
    } else {
        $error = "Usuário não encontrado!";
    }
    
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/images/favicon.svg" type="image/svg+xml"> 
    <title>Login - Sistema de Gerenciamento de Cubos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Bem-vindo ao Sistema de Gerenciamento de Cubos</h2>
        <p class="text-center">Faça login para gerenciar os cubos de forma eficiente.</p>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php if (isset($error)): ?>
                    <div class="alert alert-danger"><?php echo $error; ?></div>
                <?php endif; ?>

                <form method="POST" action="">
                    <div class="mb-3">
                        <label for="username" class="form-label">Nome de Usuário</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Senha</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary w-100 py-2">Login</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="text-center mt-4">
            <p>Usuário novo? Entre em contato com o administrador para solicitar acesso.</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
