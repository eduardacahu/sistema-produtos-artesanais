<?php
header("Content-Type: application/json");
require_once "../conexao.php";

$id = null;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $body = json_decode(file_get_contents("php://input"), true);
    $id = $body["id"] ?? null;
}

if ($id === null && isset($_GET["id"])) {
    $id = $_GET["id"];
}

if ($id === null) {
    echo json_encode([
        "status" => "erro",
        "message" => "ID do produto não informado"
    ]);
    exit;
}

$id = intval($id);

$sql = "DELETE FROM produtos WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo json_encode([
        "status" => "ok",
        "message" => "Produto excluído"
    ]);
} else {
    echo json_encode([
        "status" => "erro",
        "message" => "Erro ao excluir"
    ]);
}
?>