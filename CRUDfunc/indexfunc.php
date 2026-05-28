<?php
    require_once '../conexao.php';
    $query = $conect->prepare("SELECT * FROM funcionarios");
    $query->execute();
    $lista= $query->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funcionários</title>
</head>
<body>
    <a href="createfunc.php"><button>Adicionar funcionário</button></a>
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>nome</th>
                <th>turno</th>
                <th>horas</th> 
                <th>botões</th> 
            </tr>
        </thead>
        <tbody>
            <?php foreach($lista as $linha): ?>
            <tr>
                <td><?php echo $linha['id']; ?></td>
                <td><?php echo $linha['nome']; ?></td>
                <td><?php echo $linha['turno']; ?></td>
                <td><?php echo $linha['hora']; ?></td>
                <td>
                    <a href="update.php"><button>Atualizar</button></a>
                    <a href="delete.php"><button>Apagar</button></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>