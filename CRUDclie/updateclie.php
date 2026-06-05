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
            echo "Erro ao salvar: " . $erro[2];
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
<html lang="pt-BR" class="h-full bg-gray-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar cliente</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-full flex flex-col justify-center font-sans antialiased text-gray-900 py-12 sm:px-6 lg:px-8">

    <div class="sm:mx-auto w-full max-w-md">
        <div class="w-12 h-12 bg-emerald-100 text-emerald-600 rounded-xl flex items-center justify-center mx-auto mb-4 shadow-sm">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
            </svg>
        </div>
        <h2 class="text-center text-2xl font-bold tracking-tight text-gray-900 mb-8">
            Atualizar Cliente
        </h2>
    </div>

    <div class="sm:mx-auto w-full max-w-md">
        <div class="bg-white py-8 px-4 shadow sm:rounded-xl sm:px-10 border border-gray-200">
            
            <form action="updateclie.php" method="post" class="space-y-6">
                <input type="hidden" name="id" value="<?php echo $clie->id; ?>">
                
                <div>
                    <label for="nome" class="block text-sm font-medium text-gray-700 mb-1">Nome</label>
                    <input type="text" id="nome" name="nome" value="<?php echo $clie->nome; ?>" required
                           class="block w-full rounded-lg border border-gray-300 px-3 py-2 shadow-sm focus:border-emerald-500 focus:outline-none focus:ring-1 focus:ring-emerald-500 sm:text-sm">
                </div>

                <div>
                    <label for="dt_venda" class="block text-sm font-medium text-gray-700 mb-1">Data de venda</label>
                    <input type="date" id="dt_venda" name="dt_venda" value="<?php echo $clie->dt_venda; ?>" required
                           class="block w-full rounded-lg border border-gray-300 px-3 py-2 shadow-sm focus:border-emerald-500 focus:outline-none focus:ring-1 focus:ring-emerald-500 sm:text-sm">
                </div>

                <div>
                    <label for="valor" class="block text-sm font-medium text-gray-700 mb-1">Valor</label>
                    <input type="number" id="valor" name="valor" step="0.01" value="<?php echo $clie->valor; ?>" required
                           class="block w-full rounded-lg border border-gray-300 px-3 py-2 shadow-sm focus:border-emerald-500 focus:outline-none focus:ring-1 focus:ring-emerald-500 sm:text-sm">
                </div>

                <div class="flex items-center justify-end space-x-3 pt-2">
                    <a href="indexclie.php" class="w-1/2 sm:w-auto">
                        <button type="button" class="w-full inline-flex justify-center rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none transition duration-150">
                            Cancelar
                        </button>
                    </a>
                    <button type="submit" class="w-1/2 sm:w-auto inline-flex justify-center rounded-lg border border-transparent bg-emerald-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-emerald-700 focus:outline-none transition duration-150">
                        Salvar
                    </button>
                </div>

            </form>
        </div>
    </div>

</body>
</html>