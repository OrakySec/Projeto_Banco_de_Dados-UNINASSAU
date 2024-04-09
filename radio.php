<?php
session_start();
require_once("mysql_connect.php");

// Consulta SQL para recuperar uma música de exemplo (substitua isso com sua lógica de consulta real)
$sql = "SELECT * FROM musicas LIMIT 1"; // Aqui você deve ajustar a consulta de acordo com a estrutura do seu banco de dados

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Retorna os dados da música como JSON
    $row = $result->fetch_assoc();
    echo json_encode($row);
} else {
    echo "Nenhuma música encontrada";
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
