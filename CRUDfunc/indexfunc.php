<?php
    require_once '../conexao.php';
    $query = $conect->prepare("SELECT * FROM funcionarios");
    $query->execute();
    $lista= $query->fetchAll(PDO::FETCH_ASSOC);

    if(isset($_GET['delete_func'])){
        $delete = $_GET['delete_func'];

        $stmt = $conect->prepare("DELETE FROM funcionarios WHERE id = :id");
        $stmt->bindValue(':id', $delete);

            if ($stmt->execute()) {
            header("Location: indexfunc.php");
            exit();
        }
    }
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
                <td><?php echo $linha['horas']; ?></td>
                <td>
                    <a href="updatefunc.php?id=<?php echo $linha['id']; ?>"><button type= "button">Atualizar</button></a>
                    <a href="indexfunc.php?delete_func=<?php echo $linha['id']; ?>"onclick="return confirm('Deseja mesmo excluir?')"><button>Apagar</button></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
     <a href="../index.php"><button>Voltar</button></a>
</body>
</html>