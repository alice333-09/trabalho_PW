<?php
    require_once '../conexao.php';
    $query = $conect->prepare("SELECT * FROM vendas");
    $query->execute();
    $lista= $query->fetchAll(PDO::FETCH_ASSOC);

    if(isset($_GET['delete_vend'])){
        $delete = $_GET['delete_vend'];

        $stmt = $conect->prepare("DELETE FROM vendas WHERE id = :id");
        $stmt->bindValue(':id', $delete);

            if ($stmt->execute()) {
            header("Location: indexvend.php");
            exit();
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendas</title>
</head>
<body>
    <a href="createvend.php"><button>Adicionar vendas</button></a>
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>modelo</th>
                <th>dt_venda</th>
                <th>valor</th> 
                <th>botões</th> 
            </tr>
        </thead>
        <tbody>
            <?php foreach($lista as $linha): ?>
            <tr>
                <td><?php echo $linha['id']; ?></td>
                <td><?php echo $linha['modelo']; ?></td>
                <td><?php echo $linha['dt_venda']; ?></td>
                <td><?php echo $linha['valor']; ?></td>
                <td>
                    <a href="updatevend.php?id=<?php echo $linha['id']; ?>"><button type= "button">Atualizar</button></a>
                    <a href="indexvend.php?delete_vend=<?php echo $linha['id']; ?>"onclick="return confirm('Deseja mesmo excluir?')"><button>Apagar</button></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
     <a href="../index.php"><button>Voltar</button></a>
</body>
</html>