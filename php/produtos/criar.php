<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

header("Content-Type: application/json");
require_once "../conexao.php";

$data = json_decode(file_get_contents("php://input"), true);

echo json_encode([
    "status" => "debug",
    "dados_recebidos" => $data
]);
?>