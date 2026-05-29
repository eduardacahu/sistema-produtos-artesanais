<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "loja";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die(json_encode([
        "status" => "erro",
        "mensagem" => "Falha na conexão",
        "data" => []
    ]));
}
?>