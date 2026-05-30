<?php

header("Content-Type: application/json");

$host = "localhost";
$user = "root";
$pass = "";
$db = "loja";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die(json_encode([
        "status" => "erro",
        "message" => "Erro na conexão"
    ]));
}

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $sql = "SELECT * FROM produtos WHERE id = ?";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("i", $id);
    $stmt->execute();

    $result = $stmt->get_result();

    $produto = $result->fetch_assoc();

    echo json_encode([
        "status" => "ok",
        "data" => $produto
    ]);

} else {

    $sql = "SELECT * FROM produtos";

    $result = $conn->query($sql);

    $produtos = [];

    while ($row = $result->fetch_assoc()) {
        $produtos[] = $row;
    }

    echo json_encode([
        "status" => "ok",
        "data" => $produtos
    ]);
}
?>