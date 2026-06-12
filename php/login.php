<?php

session_start();

include "conexao.php";

$usuario = $_POST["usuario"] ?? "";
$senha = $_POST["senha"] ?? "";

$sql = "SELECT * FROM usuarios
        WHERE usuario='$usuario'
        AND senha='$senha'";

$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {

    $_SESSION["usuario"] = $usuario;

    header("Location: ../home/index.php");
    exit();

} else {

    echo "
    <script>
        alert('Usuário ou senha inválidos');
        window.location='../login/index.php';
    </script>
    ";
}
?>