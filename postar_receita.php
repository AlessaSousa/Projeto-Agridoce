<?php
session_start();
include("conexao.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_SESSION['cod'];
    $titulo = mysqli_real_escape_string($con, $_POST['titulo']);
    $descricao = mysqli_real_escape_string($con, $_POST['descricao']);
    $imagem = '';

    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
        $imagem_nome = $_FILES['imagem']['name'];
        $imagem_tmp_nome = $_FILES['imagem']['tmp_name'];
        $upload_dir = 'uploads/';
        $imagem = $upload_dir . basename($imagem_nome);

        if (!move_uploaded_file($imagem_tmp_nome, $imagem)) {
            echo "Houve uma falha no upload da imagem!";
        }
    }

    $query = "INSERT INTO receita (autor, titulo, foto, descricao) VALUES ('$usuario', '$titulo', '$imagem', '$descricao')";
    
    if (mysqli_query($con, $query)) {
        header('Location: feed.php');
        exit();
    } else {
        echo "Error: " . mysqli_error($con);
        echo $query;
    }
}
?>