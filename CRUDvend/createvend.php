<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar vendas</title>
</head>
<body>
    <form action="createvend.php" method="post">
        <label for="vend">Adicionar vendas</label><br><br>

        Modelo: <input type="text" name="modelo"><br>
        Data de venda: <input type="date" name="data"><br>
        Valor: <input type="number" name="valor"><br><br>

        <button type="submit">Salvar</button>
        <a href="indexvend.php"><button type="button">Cancelar</button></a>
    </form>
</body>
</html>
<?php
    require_once '../conexao.php';
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $modelo = $_POST['modelo'];
        $data = $_POST['data'];
        $valor = $_POST['valor'];

        $stmt = $conect->prepare("INSERT INTO vendas (modelo, dt_venda, valor) VALUES (:modelo, :dt_venda, :valor)");
        $stmt->bindValue(":modelo", $modelo);
        $stmt->bindValue(":dt_venda", $data);
        $stmt->bindValue(":valor", $valor);

    if($stmt->execute()){
        header("location:indexvend.php");
        exit();
    }else{
        $erro = $stmt->errorInfo();
        echo"Erro ao salvar". $erro[2];
        }
    }
?>