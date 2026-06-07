<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-BR" class="h-full bg-gray-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Gerenciador LN</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-full flex flex-col justify-between font-sans antialiased text-gray-900">

    <div class="max-w-5xl w-full mx-auto px-4 py-8 sm:px-6 lg:px-8 flex-grow">
        
        <header class="flex flex-col sm:flex-row sm:items-center sm:justify-between border-b border-gray-200 pb-5 mb-8">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 sm:text-3xl tracking-tight">
                    Seja bem-vindo(a), <span class="text-blue-600"><?php echo htmlspecialchars($_SESSION['usuario_nome']); ?></span>!
                </h1>
                <p class="mt-1 text-sm text-gray-500">Painel de controle do Sistema Gerenciador LN.</p>
            </div>
            
            <div class="hidden sm:block">
                <a href="logout.php" class="inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-lg text-sm font-medium text-red-600 bg-red-50 hover:bg-red-100 transition duration-150 ease-in-out">
                    Sair do Sistema
                </a>
            </div>
        </header>

        <main>
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-3 sm:gap-6">
                
                <a href="CRUDFunc/indexfunc.php" class="group relative bg-white p-6 rounded-xl shadow-sm border border-gray-200 hover:shadow-md hover:border-blue-500 transition duration-200 ease-in-out flex flex-col justify-between">
                    <div>
                        <div class="w-10 h-10 bg-blue-50 rounded-lg flex items-center justify-center text-blue-600 group-hover:bg-blue-600 group-hover:text-white transition duration-200 mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-1">Funcionários</h3>
                        <p class="text-sm text-gray-500">Gerencie o cadastro, turno e horas trabalhadas da equipe.</p>
                    </div>
                    <div class="mt-4 text-sm font-medium text-blue-600 group-hover:text-blue-700 flex items-center">
                        Acessar módulo &rarr;
                    </div>
                </a>

                <a href="CRUDclie/indexclie.php" class="group relative bg-white p-6 rounded-xl shadow-sm border border-gray-200 hover:shadow-md hover:border-blue-500 transition duration-200 ease-in-out flex flex-col justify-between">
                    <div>
                        <div class="w-10 h-10 bg-emerald-50 rounded-lg flex items-center justify-center text-emerald-600 group-hover:bg-emerald-600 group-hover:text-white transition duration-200 mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 014 0m-3 7a3 3 0 11-6 0 3 3 0 016 0zm6 3h-2m2-3h-2"></path></svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-1">Clientes</h3>
                        <p class="text-sm text-gray-500">Visualize histórico, datas e compras realizadas por clientes.</p>
                    </div>
                    <div class="mt-4 text-sm font-medium text-emerald-600 group-hover:text-emerald-700 flex items-center">
                        Acessar módulo &rarr;
                    </div>
                </a>

                <a href="CRUDvend/indexvend.php" class="group relative bg-white p-6 rounded-xl shadow-sm border border-gray-200 hover:shadow-md hover:border-blue-500 transition duration-200 ease-in-out flex flex-col justify-between">
                    <div>
                        <div class="w-10 h-10 bg-amber-50 rounded-lg flex items-center justify-center text-amber-600 group-hover:bg-amber-600 group-hover:text-white transition duration-200 mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-1">Vendas</h3>
                        <p class="text-sm text-gray-500">Acompanhe relatórios, valores e novos pedidos.</p>
                    </div>
                    <div class="mt-4 text-sm font-medium text-amber-600 group-hover:text-amber-700 flex items-center">
                        Acessar módulo &rarr;
                    </div>
                </a>

            </div>
        </main>
    </div>

    <div class="sm:hidden w-full p-4 bg-white border-t border-gray-200">
        <a href="logout.php" class="w-full flex items-center justify-center py-3 px-4 border border-transparent rounded-lg text-base font-medium text-white bg-red-600 hover:bg-red-700 transition duration-150">
            Sair do Sistema
        </a>
    </div>

</body>
</html>