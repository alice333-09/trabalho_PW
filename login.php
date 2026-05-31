<?php
session_start(); 

if (isset($_SESSION['erro_login'])) {
    echo  $_SESSION['erro_login'];
    unset($_SESSION['erro_login']);
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login - Sistema Gerenciador</title>
</head>
<body>
    <h2>Área de Login</h2>
    <form action="validarlogin.php" method="POST">
        <label>Usuário/E-mail:</label><br>
        <input type="email" name="usuario" required><br><br>
        
        <label>Senha:</label><br>
        <input type="password" name="senha" required><br><br>
        
        <button type="submit">Entrar</button>
    </form>
</body>
</html>

