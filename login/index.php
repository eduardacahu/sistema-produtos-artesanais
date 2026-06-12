<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card mx-auto" style="max-width:400px;">
        <div class="card-body">

            <h3 class="text-center mb-4">
                Login do Sistema
            </h3>

            <form action="../php/login.php" method="POST">

                <input
                    type="text"
                    name="usuario"
                    class="form-control mb-3"
                    placeholder="Usuário"
                    required
                >

                <input
                    type="password"
                    name="senha"
                    class="form-control mb-3"
                    placeholder="Senha"
                    required
                >

                <button
                    type="submit"
                    class="btn btn-primary w-100"
                >
                    Entrar
                </button>

            </form>

        </div>
    </div>

</div>

</body>
</html>