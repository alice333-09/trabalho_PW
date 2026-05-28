<?php
// Inicia a sessão para verificar as variáveis guardadas
session_start();

// Se a variável de sessão não existir, manda de volta para a tela de login
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Gerenciador LN</title>
</head>
<body>
    <h1>Seja bem-vindo(a), <?php echo $_SESSION['usuario_nome']; ?>!</h1>.
    <a href="CRUDfunc/indexfunc.php"><button>Funcionários</button></a>
    <a href="CRUDclie/indexclie.php"><button>Clientes</button></a>
    <a href="CRUDvend/indexvend.php"><button>Vendas</button></a>

    <a href="logout.php"><button>Sair do Sistema</button></a>
</body>
</html>