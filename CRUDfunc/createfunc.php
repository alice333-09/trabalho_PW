<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar funcionário</title>
</head>
<body>
    <form action="createfunc.php" method="post">
        <label for="func">Adicionar funcionário</label><br><br>

        Nome: <input type="text" name="nome"><br>

        Turno: <input type="radio" name="turno" id="matutino" value="Matutino">
        <label for="matutino">Matutino</label>
        <input type="radio" name="turno" id="vespertino" value="Vespertino">
        <label for="vespertino">Vespertino</label>
        <input type="radio" name="turno" id="noturno" value="Noturno">
        <label for="noturno">Noturno</label><br>
        
        Horas: <input type="time" name="horas"><br><br>

        <button type="submit">Salvar</button>
        <a href="indexfunc.php"><button type="button">Cancelar</button></a>
    </form>
</body>
</html>
<?php
    require_once '../conexao.php';
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $func = $_POST['nome'];
        $turno = $_POST['turno'];
        $horas = $_POST['horas'];

        $stmt = $conect->prepare("INSERT INTO funcionarios (nome, turno, horas) VALUES (:nome, :turno, :horas) ");
        $stmt->bindValue(":nome", $func);
        $stmt->bindValue(":turno", $turno);
        $stmt->bindValue(":horas", $horas);

    if($stmt->execute()){
        header("location:indexfunc.php");
        exit();
    }else{
        $erro = $stmt->errorInfo();
        echo"Erro ao salvar". $erro[2];
        }
    }
?>