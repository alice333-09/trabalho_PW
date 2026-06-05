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
            echo "Erro ao salvar: " . $erro[2];
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-BR" class="h-full bg-gray-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar funcionário</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-full flex flex-col justify-center font-sans antialiased text-gray-900 py-12 sm:px-6 lg:px-8">

    <div class="sm:mx-auto w-full max-w-md">
        <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center mx-auto mb-4 shadow-sm">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
            </svg>
        </div>
        <h2 class="text-center text-2xl font-bold tracking-tight text-gray-900 mb-8">
            Adicionar Funcionário
        </h2>
    </div>

    <div class="sm:mx-auto w-full max-w-md">
        <div class="bg-white py-8 px-4 shadow sm:rounded-xl sm:px-10 border border-gray-200">
            
            <form action="createfunc.php" method="post" class="space-y-6">
                
                <div>
                    <label for="nome" class="block text-sm font-medium text-gray-700 mb-1">Nome</label>
                    <input type="text" id="nome" name="nome" required
                           class="block w-full rounded-lg border border-gray-300 px-3 py-2 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500 sm:text-sm">
                </div>

                <div>
                    <span class="block text-sm font-medium text-gray-700 mb-2">Turno</span>
                    <div class="flex flex-wrap gap-4 pt-1">
                        <div class="flex items-center">
                            <input type="radio" name="turno" id="matutino" value="Matutino" required
                                   class="h-4 w-4 border-gray-300 text-blue-600 focus:ring-blue-500">
                            <label for="matutino" class="ml-2 block text-sm text-gray-700">Matutino</label>
                        </div>
                        <div class="flex items-center">
                            <input type="radio" name="turno" id="vespertino" value="Vespertino"
                                   class="h-4 w-4 border-gray-300 text-blue-600 focus:ring-blue-500">
                            <label for="vespertino" class="ml-2 block text-sm text-gray-700">Vespertino</label>
                        </div>
                        <div class="flex items-center">
                            <input type="radio" name="turno" id="noturno" value="Noturno"
                                   class="h-4 w-4 border-gray-300 text-blue-600 focus:ring-blue-500">
                            <label for="noturno" class="ml-2 block text-sm text-gray-700">Noturno</label>
                        </div>
                    </div>
                </div>

                <div>
                    <label for="horas" class="block text-sm font-medium text-gray-700 mb-1">Horas</label>
                    <input type="time" id="horas" name="horas" required
                           class="block w-full rounded-lg border border-gray-300 px-3 py-2 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500 sm:text-sm">
                </div>

                <div class="flex items-center justify-end space-x-3 pt-2">
                    <a href="indexfunc.php" class="w-1/2 sm:w-auto">
                        <button type="button" class="w-full inline-flex justify-center rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none transition duration-150">
                            Cancelar
                        </button>
                    </a>
                    <button type="submit" class="w-1/2 sm:w-auto inline-flex justify-center rounded-lg border border-transparent bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none transition duration-150">
                        Salvar
                    </button>
                </div>

            </form>
        </div>
    </div>

</body>
</html>