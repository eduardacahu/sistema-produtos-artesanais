<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = "localhost";
$user = "root";
$pass = "";
$db = "loja";

$conn = new mysqli($host, $user, $pass, $db);

// verifica conexão
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// busca produtos
$sql = "SELECT * FROM produtos";
$result = $conn->query($sql);
?>

<h1>Produtos da Loja</h1>

<table border="1" cellpadding="8">
    <tr>
        <th>Nome</th>
        <th>Categoria</th>
        <th>Preço</th>
        <th>Estoque</th>
    </tr>

    <?php
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['nome']}</td>
                    <td>{$row['categoria']}</td>
                    <td>{$row['preço']}</td>
                    <td>{$row['estoque']}</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='4'>Nenhum produto encontrado</td></tr>";
    }
    ?>
</table>