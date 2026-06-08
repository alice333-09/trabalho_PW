<?php
require_once '../conexao.php';
$query = $conect->prepare("SELECT * FROM clientes");
$query->execute();
$lista = $query->fetchAll(PDO::FETCH_ASSOC);

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
<html lang="pt-BR" class="h-full bg-gray-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-full flex flex-col justify-between font-sans antialiased text-gray-900">

    <div class="max-w-5xl w-full mx-auto px-4 py-8 sm:px-6 lg:px-8 flex-grow">
        
        <header class="flex flex-col sm:flex-row sm:items-center sm:justify-between border-b border-gray-200 pb-5 mb-8">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 sm:text-3xl tracking-tight">
                    Módulo de <span class="text-emerald-600">Clientes</span>
                </h1>
                <p class="mt-1 text-sm text-gray-500">Gerencie o histórico, valores e cadastros de clientes.</p>
            </div>
            
            <div class="mt-4 sm:mt-0">
                <a href="createclie.php" class="inline-flex items-center justify-center px-4 py-2.5 border border-transparent rounded-lg text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 shadow-sm transition duration-150 ease-in-out">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Adicionar clientes
                </a>
            </div>
        </header>

        <main>
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 text-left text-sm">
                        <thead class="bg-gray-50 text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            <tr>
                                <th class="px-6 py-4">id</th>
                                <th class="px-6 py-4">nome</th>
                                <th class="px-6 py-4">data de venda</th>
                                <th class="px-6 py-4">valor</th>
                                <th class="px-6 py-4 text-right">botões</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white text-gray-700">
                            <?php foreach($lista as $linha): ?>
                            <tr class="hover:bg-gray-50 transition duration-150">
                                <td class="px-6 py-4 font-mono text-xs text-gray-400"><?php echo $linha['id']; ?></td>
                                <td class="px-6 py-4 font-medium text-gray-900"><?php echo $linha['nome']; ?></td>
                                <td class="px-6 py-4"><?php echo $linha['dt_venda']; ?></td>
                                <td class="px-6 py-4 font-medium text-gray-900">R$ <?php echo number_format($linha['valor'], 2, ',', '.'); ?></td>
                                <td class="px-6 py-4 text-right space-x-2 whitespace-nowrap">
                                    <a href="updateclie.php?id=<?php echo $linha['id']; ?>">
                                        <button type="button" class="inline-flex items-center px-3 py-1.5 border border-gray-300 rounded-md text-xs font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none transition duration-150">
                                            Atualizar
                                        </button>
                                    </a>
                                    <a href="indexclie.php?delete_clie=<?php echo $linha['id']; ?>" onclick="return confirm('Deseja mesmo excluir?')">
                                        <button type="button" class="inline-flex items-center px-3 py-1.5 border border-transparent rounded-md text-xs font-medium text-red-600 bg-red-50 hover:bg-red-100 focus:outline-none transition duration-150">
                                            Apagar
                                        </button>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mt-6">
                <a href="../index.php">
                    <button class="inline-flex items-center justify-center px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 shadow-sm transition duration-150 ease-in-out">
                        &larr; Voltar
                    </button>
                </a>
            </div>
        </main>
    </div>

</body>
</html>