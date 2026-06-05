<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="pt-BR" class="h-full bg-gray-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistema Gerenciador</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-full flex items-center justify-center px-4 sm:px-6 lg:px-8">
    
    <div class="max-w-md w-full space-y-6 bg-white p-8 rounded-xl shadow-md border border-gray-100">
        <div>
            <h2 class="mt-2 text-center text-3xl font-extrabold text-gray-950 tracking-tight">
                Área de Login
            </h2>
        </div>

        <?php
        if (isset($_SESSION['erro_login'])) {
            echo '<div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg text-sm font-medium text-center shadow-sm" role="alert">' . $_SESSION['erro_login'] . '</div>';
            unset($_SESSION['erro_login']);
        }
        ?>

        <form class="mt-4 space-y-5" action="validarlogin.php" method="POST">
            <div class="space-y-4">
                <div>
                    <label for="usuario" class="block text-sm font-medium text-gray-700 mb-1">
                        Usuário/E-mail
                    </label>
                    <input
                        type="email" name="usuario" id="usuario" required
                        class="appearance-none rounded-lg relative block w-full px-3 py-2.5 border border-gray-300 placeholder-gray-400 text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        placeholder="seu@email.com"
                    >
                </div>
        
                <div>
                    <label for="senha" class="block text-sm font-medium text-gray-700 mb-1">
                        Senha
                    </label>
                    <input 
                        id="senha"
                        type="password" 
                        name="senha" 
                        required 
                        class="appearance-none rounded-lg relative block w-full px-3 py-2.5 border border-gray-300 placeholder-gray-400 text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        placeholder="••••"
                    >
                </div>
            </div>

            <div>
                <button 
                    type="submit" 
                    class="group relative w-full flex justify-center py-2.5 px-4 border border-transparent text-sm font-semibold rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out"
                >
                    Entrar
                </button>
            </div>
        </form>
    </div>

</body>
</html>