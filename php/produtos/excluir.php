<?php
header("Content-Type: application/json");
require_once "../conexao.php";

$id = $_GET["id"];

$sql = "DELETE FROM produtos WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo json_encode([
        "status" => "ok",
        "mensagem" => "Produto excluído"
    ]);
} else {
    echo json_encode([
        "status" => "erro",
        "mensagem" => "Erro ao excluir"
    ]);
}
?>