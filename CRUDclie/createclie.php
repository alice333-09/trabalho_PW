<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar cliente</title>
</head>
<body>
    <form action="createclie.php" method="post">
        <label for="func">Adicionar cliente</label><br><br>

        Nome: <input type="text" name="nome"><br>
        Data de venda: <input type="date" name="data"><br>
        Valor: <input type="number" name="valor"><br><br>

        <button type="submit">Salvar</button>
        <a href="indexclie.php"><button type="button">Cancelar</button></a>
    </form>
</body>
</html>
<?php
    require_once '../conexao.php';
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $clie = $_POST['nome'];
        $data = $_POST['data'];
        $valor = $_POST['valor'];

        $stmt = $conect->prepare("INSERT INTO clientes (nome, dt_venda, valor) VALUES (:nome, :dt_venda, :valor)");
        $stmt->bindValue(":nome", $clie);
        $stmt->bindValue(":dt_venda", $data);
        $stmt->bindValue(":valor", $valor);

    if($stmt->execute()){
        header("location:indexclie.php");
        exit();
    }else{
        $erro = $stmt->errorInfo();
        echo"Erro ao salvar". $erro[2];
        }
    }
?>