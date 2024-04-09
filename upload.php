<?php
session_start();
require_once("mysql_connect.php");

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $name = $_POST["name"];
    $songName = $_POST["songName"];
    $image = $_FILES["image"]["name"];
    $audio = $_FILES["audio"]["name"];

    // Move os arquivos para a pasta de destino
    $targetDir = "uploads/";
    move_uploaded_file($_FILES["image"]["tmp_name"], $targetDir . $image);
    move_uploaded_file($_FILES["audio"]["tmp_name"], $targetDir . $audio);

    // Prepara a instrução SQL para inserir os dados no banco de dados
    $sql = "INSERT INTO geral (nomeUsuario, nomeMusica, imagemMusica, audioMusica) VALUES ('$name', '$songName', '$image', '$audio')";

    // Executa a instrução SQL
    if ($conn->query($sql) === TRUE) {
        echo "Música enviada com sucesso!";
    } else {
        echo "Erro ao enviar a música: " . $conn->error;
    }
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
