<?php
    require_once '../conexao.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nome = $_POST['nome'];
    $turno = $_POST['turno'];
    $horas = $_POST['horas'];
    $id = $_POST['id'];
    $stmt = $conect->prepare("UPDATE funcionarios SET nome = :nome, turno = :turno, horas = :horas WHERE id = :id");
    $stmt->bindValue(":nome", $nome);
    $stmt->bindValue(":turno", $turno);
    $stmt->bindValue(":horas", $horas);
    $stmt->bindValue(":id", $id);

    if($stmt->execute()){
        header("location:indexfunc.php");
        exit();
    }else{
        $erro = $stmt->errorInfo();
        echo"Erro ao salvar". $erro[2];
        }
    }

    $id = $_GET['id'] ?? null;
    $stmt = $conect->prepare("SELECT * FROM funcionarios WHERE id = :id");
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    if ($stmt->rowCount() == 0) { 
        die('Registro não encontrado');
    } else {
        $func = $stmt->fetch(PDO::FETCH_OBJ);
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar funcionário</title>
</head>
<body>
    <form action="updatefunc.php" method="post">
        <input type="hidden" name="id" value="<?php echo $func->id; ?>">

        <label for="name">Atualizar funcionário</label><br><br>
        Nome: <input type="text" name="nome" value="<?php echo $func->nome; ?>"><br>

        Turno: <input type="radio" name="turno" value="Matutino" id="matutino" <?php echo ($func->turno == 'Matutino') ? 'checked' : ''; ?>>
        <label for="matutino">Matutino</label>
        <input type="radio" name="turno" value="Vespertino" id="vespertino" <?php echo ($func->turno == 'Vespertino') ? 'checked' : ''; ?>>
        <label for="name">Vespertino</label>
        <input type="radio" name="turno" value="Noturno" id="noturno" <?php echo ($func->turno == 'Noturno') ? 'checked' : ''; ?>>
        <label for="matutino">Noturno</label><br>

        Horas: <input type="text" name="horas" value="<?php echo $func->horas; ?>"><br><br>
        <button type="submit">Salvar</button>
        <a href="indexfunc.php"><button type="button">Cancelar</button></a>
    </form>
</body>
</html>