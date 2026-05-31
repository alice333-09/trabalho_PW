<?php
    require_once '../conexao.php';
    $query = $conect->prepare("SELECT * FROM clientes");
    $query->execute();
    $lista= $query->fetchAll(PDO::FETCH_ASSOC);

    if(isset($_GET['delete_clie'])){
        $delete = $_GET['delete_clie'];

        $stmt = $conect->prepare("DELETE FROM clientes WHERE id = :id");
        $stmt->bindValue(':id', $delete);

            if ($stmt->execute()) {
            header("Location: indexclie.php");
            exit();
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
</head>
<body>
    <a href="createclie.php"><button>Adicionar clientes</button></a>
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>nome</th>
                <th>dt_venda</th>
                <th>valor</th> 
                <th>botões</th> 
            </tr>
        </thead>
        <tbody>
            <?php foreach($lista as $linha): ?>
            <tr>
                <td><?php echo $linha['id']; ?></td>
                <td><?php echo $linha['nome']; ?></td>
                <td><?php echo $linha['dt_venda']; ?></td>
                <td><?php echo $linha['valor']; ?></td>
                <td>
                    <a href="updateclie.php?id=<?php echo $linha['id']; ?>"><button type= "button">Atualizar</button></a>
                    <a href="indexclie.php?delete_clie=<?php echo $linha['id']; ?>"onclick="return confirm('Deseja mesmo excluir?')"><button>Apagar</button></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
     <a href="../index.php"><button>Voltar</button></a>
</body>
</html>