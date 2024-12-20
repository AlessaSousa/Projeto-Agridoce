<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AGRIDOCE</title>
    <link rel="stylesheet" href="style/loginStyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abel&family=IBM+Plex+Mono:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abel&family=IBM+Plex+Mono:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Kelly+Slab&display=swap" rel="stylesheet">
</head>
<body>    
  
<div class="logo"><a href="index.php">AGRIDOCE</a></div>

    <div class="container"> 
        <div class="box form-box">
            
    <header>LOGIN</header>
    <form method="post" onsubmit="return validarForm()">
        <div class="field input">
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" required>

        </div>
        <div class="field input">
            <label for ="senha" >Senha</label>
            <input type="password" name="senha" id="senha" required>

        </div>
        <div class="field">
            <input type="submit" class="btn-login" name="enviar" value="login" required>
            
        </div>
        <div class="links">
            Você não tem uma conta? <a href="cadastro.php">Cadastre-se</a><br>
            Deseja alterar a senha? <a href="alterarSenha.php">Alterar</a>
        </div>
    </form>
    </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <script>
    function validarForm() {
    var email = document.getElementById('email').value;
    var senha = document.getElementById('senha').value;

    if (email === '' || senha === '') {
      alert('Por favor, preencha todos os campos.');
      return false;
    }

    // Aqui você pode adicionar a lógica para autenticação com o backend

    return true;
  }
</script>

<?php
error_reporting(E_ALL); // Enable error reporting
require('conexao.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['email']) && isset($_POST['senha'])) {
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        
        $query = "SELECT * FROM usuario WHERE email=?";
        $stmt = $con->prepare($query);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();
            if (password_verify($senha, $user['senha'])) {
                $_SESSION['email'] = $email;
                $_SESSION['nome'] = $user['nome'];
                $_SESSION['cod'] = $user['cod'];
                header("Location: feed.php");
                exit(); // End the script after redirect
            } else {
                echo "<script>
                alert('Senha incorreta. Tente novamente');
                window.location='login.php';
                </script>";
                exit(); // End the script after redirect
            }
        } else {
            echo "<script>
                alert('Não foi possível entrar: E-mail ou senha estão errados, ou não existe!');
                window.location='login.php';
                </script>";
            exit(); // End the script after redirect
        }
    } else {
        echo "<script>
            alert('Por favor, preencha todos os campos.');
            window.location='login.php';
            </script>";
        exit(); // End the script after redirect
    }
}
?>


</body>
</html>