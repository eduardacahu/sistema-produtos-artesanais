<?php
header("Content-Type: application/json");
require_once "../conexao.php";

$data = json_decode(file_get_contents("php://input"), true);
$id = intval($data["id"] ?? 0);
$nome = trim($data["nome"] ?? "");
$categoria = trim($data["categoria"] ?? "");
$preco = $data["preco"] ?? null;
$estoque = $data["estoque"] ?? null;
$ativo = $data["ativo"] ?? null;

if ($id <= 0 || $nome === "" || $categoria === "" || $preco === null || $estoque === null || $ativo === null) {
    echo json_encode([
        "status" => "erro",
        "message" => "Dados do produto incompletos"
    ]);
    exit;
}

$preco = floatval($preco);
$estoque = intval($estoque);
$ativo = intval($ativo);

$sql = "UPDATE produtos SET nome = ?, categoria = ?, preco = ?, estoque = ?, ativo = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssdiii", $nome, $categoria, $preco, $estoque, $ativo, $id);

if ($stmt->execute()) {
    echo json_encode([
        "status" => "ok",
        "message" => "Produto atualizado com sucesso"
    ]);
} else {
    echo json_encode([
        "status" => "erro",
        "message" => "Erro ao atualizar produto"
    ]);
}
?>