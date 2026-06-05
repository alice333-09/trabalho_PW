<?php
// Todo o processamento PHP no topo evita erros de redirecionamento do header
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
        echo "Erro ao salvar: " . $erro[2];
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR" class="h-full bg-gray-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar vendas</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-full flex flex-col justify-center font-sans antialiased text-gray-900 py-12 sm:px-6 lg:px-8">

    <div class="sm:mx-auto w-full max-w-md">
        <div class="w-12 h-12 bg-purple-100 text-purple-600 rounded-xl flex items-center justify-center mx-auto mb-4 shadow-sm">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
            </svg>
        </div>
        <h2 class="text-center text-2xl font-bold tracking-tight text-gray-900 mb-8">
            Adicionar Nova Venda
        </h2>
    </div>

    <div class="sm:mx-auto w-full max-w-md">
        <div class="bg-white py-8 px-4 shadow sm:rounded-xl sm:px-10 border border-gray-200">
            
            <form action="createvend.php" method="post" class="space-y-6">
                
                <div>
                    <label for="modelo" class="block text-sm font-medium text-gray-700 mb-1">Modelo</label>
                    <input type="text" id="modelo" name="modelo" required
                           class="block w-full rounded-lg border border-gray-300 px-3 py-2 shadow-sm focus:border-purple-500 focus:outline-none focus:ring-1 focus:ring-purple-500 sm:text-sm">
                </div>

                <div>
                    <label for="data" class="block text-sm font-medium text-gray-700 mb-1">Data de venda</label>
                    <input type="date" id="data" name="data" required
                           class="block w-full rounded-lg border border-gray-300 px-3 py-2 shadow-sm focus:border-purple-500 focus:outline-none focus:ring-1 focus:ring-purple-500 sm:text-sm">
                </div>

                <div>
                    <label for="valor" class="block text-sm font-medium text-gray-700 mb-1">Valor</label>
                    <input type="number" id="valor" name="valor" step="0.01" required
                           class="block w-full rounded-lg border border-gray-300 px-3 py-2 shadow-sm focus:border-purple-500 focus:outline-none focus:ring-1 focus:ring-purple-500 sm:text-sm">
                </div>

                <div class="flex items-center justify-end space-x-3 pt-2">
                    <a href="indexvend.php" class="w-1/2 sm:w-auto inline-flex justify-center rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 transition duration-150">
                        Cancelar
                    </a>
                    <button type="submit" class="w-1/2 sm:w-auto inline-flex justify-center rounded-lg border border-transparent bg-purple-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none transition duration-150">
                        Salvar
                    </button>
                </div>

            </form>
        </div>
    </div>

</body>
</html>