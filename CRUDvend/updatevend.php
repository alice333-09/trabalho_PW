<?php
    require_once '../conexao.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $modelo = $_POST['modelo'];
    $dt_venda = $_POST['dt_venda'];
    $valor = $_POST['valor'];
    $id = $_POST['id'];
    $stmt = $conect->prepare("UPDATE vendas SET modelo = :modelo, dt_venda = :dt_venda, valor = :valor WHERE id = :id");
    $stmt->bindValue(":modelo", $modelo);
    $stmt->bindValue(":dt_venda", $dt_venda);
    $stmt->bindValue(":valor", $valor);
    $stmt->bindValue(":id", $id);

    if($stmt->execute()){
        header("location:indexvend.php");
        exit();
    }else{
        $erro = $stmt->errorInfo();
        echo"Erro ao salvar". $erro[2];
        }
    }

    $id = $_GET['id'] ?? null;
    $stmt = $conect->prepare("SELECT * FROM vendas WHERE id = :id");
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    if ($stmt->rowCount() == 0) { 
        die('Registro não encontrado');
    } else {
        $vend = $stmt->fetch(PDO::FETCH_OBJ);
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar venda</title>
</head>
<body>
    <form action="updatevend.php" method="post">
        <input type="hidden" name="id" value="<?php echo $vend->id; ?>">

        <label for="name">Atualizar venda</label><br><br>
        Nome: <input type="text" name="modelo" value="<?php echo $vend->modelo; ?>"><br>
        Data de venda: <input type="date" name="dt_venda" value="<?php echo $vend->dt_venda; ?>"><br>
        Valor: <input type="number" name="valor" value="<?php echo $vend->valor; ?>"><br><br>
        <button type="submit">Salvar</button>
        <a href="indexvend.php"><button type="button">Cancelar</button></a>
    </form>
</body>
</html>