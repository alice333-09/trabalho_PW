<?php
    require_once '../conexao.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nome = $_POST['nome'];
    $dt_venda = $_POST['dt_venda'];
    $valor = $_POST['valor'];
    $id = $_POST['id'];
    $stmt = $conect->prepare("UPDATE clientes SET nome = :nome, dt_venda = :dt_venda, valor = :valor WHERE id = :id");
    $stmt->bindValue(":nome", $nome);
    $stmt->bindValue(":dt_venda", $dt_venda);
    $stmt->bindValue(":valor", $valor);
    $stmt->bindValue(":id", $id);

    if($stmt->execute()){
        header("location:indexclie.php");
        exit();
    }else{
        $erro = $stmt->errorInfo();
        echo"Erro ao salvar". $erro[2];
        }
    }

    $id = $_GET['id'] ?? null;
    $stmt = $conect->prepare("SELECT * FROM clientes WHERE id = :id");
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    if ($stmt->rowCount() == 0) { 
        die('Registro não encontrado');
    } else {
        $clie = $stmt->fetch(PDO::FETCH_OBJ);
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar cliente</title>
</head>
<body>
    <form action="updateclie.php" method="post">
        <input type="hidden" name="id" value="<?php echo $clie->id; ?>">

        <label for="name">Atualizar cliente</label><br><br>
        Nome: <input type="text" name="nome" value="<?php echo $clie->nome; ?>"><br>
        Data de venda: <input type="date" name="dt_venda" value="<?php echo $clie->dt_venda; ?>"><br>
        Valor: <input type="number" name="valor" value="<?php echo $clie->valor; ?>"><br><br>
        <button type="submit">Salvar</button>
        <a href="indexclie.php"><button type="button">Cancelar</button></a>
    </form>
</body>
</html>