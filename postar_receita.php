<?php
session_start();
include("conexao.php");

// script tratando a requisição da postagem de receitas, resgatando o id do usuário, 
// titulo, descrição e imagem da receita a ser postada
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_SESSION['cod'];
    $titulo = mysqli_real_escape_string($con, $_POST['titulo']);
    $descricao = mysqli_real_escape_string($con, $_POST['descricao']);
    $imagem = '';

    // função pra fazer o diretório uploads existir caso não tenha na sua máquina
    $upload_dir = 'uploads';
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0755, true);
    }

    //script pra inserção da imagem (caminho dela) no banco de dados
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
        $imagem_nome = basename($_FILES['imagem']['name']);
        $imagem_tmp_nome = $_FILES['imagem']['tmp_name'];
        $imagem = $upload_dir . '/' . $imagem_nome;

        if (!move_uploaded_file($imagem_tmp_nome, $imagem)) {
            echo "Houve uma falha no upload da imagem!";
            exit();
        }
    }

    // insere a receita no banco de dados (mudei o nome dos campos pq achei que ficou mais intuitivo assim)
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
