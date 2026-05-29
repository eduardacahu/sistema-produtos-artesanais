<?php
header("Content-Type: application/json; charset=UTF-8");
require_once "../conexao.php";

$sql = "SELECT * FROM produtos";
$resultado = $conn->query($sql);

$produtos = [];

while ($row = $resultado->fetch_assoc()) {
    $produtos[] = [
        "id" => $row["id"],
        "nome" => $row["nome"],
        "categoria" => $row["categoria"] ?? "",
        "preco" => $row["preco"] ?? $row["preço"] ?? "",
        "estoque" => $row["estoque"] ?? ""
    ];
}

echo json_encode([
    "status" => "ok",
    "data" => $produtos
], JSON_UNESCAPED_UNICODE);
?>