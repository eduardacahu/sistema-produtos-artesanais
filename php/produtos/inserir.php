<?php
header("Content-Type: application/json");
require_once "../conexao.php";

$data = json_decode(file_get_contents("php://input"), true);
$nome = trim($data["nome"] ?? "");
$categoria = trim($data["categoria"] ?? "");
$preco = $data["preco"] ?? null;
$estoque = $data["estoque"] ?? null;
$ativo = $data["ativo"] ?? 1;

if ($nome === "" || $categoria === "" || $preco === null || $estoque === null) {
    echo json_encode([
        "status" => "erro",
        "message" => "Todos os campos são obrigatórios"
    ]);
    exit;
}

$preco = floatval($preco);
$estoque = intval($estoque);
$ativo = intval($ativo);

$sql = "INSERT INTO produtos (nome, categoria, preco, estoque, ativo) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssdii", $nome, $categoria, $preco, $estoque, $ativo);

if ($stmt->execute()) {
    echo json_encode([
        "status" => "ok",
        "message" => "Produto cadastrado com sucesso"
    ]);
} else {
    echo json_encode([
        "status" => "erro",
        "message" => "Erro ao cadastrar produto"
    ]);
}
?>