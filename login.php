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
  
    <div class="logo">AGRIDOCE</div>
  
    <div class="container"> 
       <div class="container-bv">
        <div class="box-bv form-box-bv">
            <header> BEM VINDO À <br> 
                AGRIDOCE</header>
                <br>
                <br>
            <p>Nossa missão é conectar pessoas através<br>
                 do amor pela comida, proporcionando um<br>
                 espaço acolhedor para explorar, aprender e<br>
                 celebrar a diversidade cultural e criativa<br>
                 da culinária. Junte-se a nós e embarque em uma<br>
                 jornada deliciosa de sabores, texturas e aromas </p>
        </div>
        </div>
        <div class="box form-box">
            
    <header>LOGIN</header>
    <form method="post" onsubmit="return validarForm()">
        <div class="field input">
            <label for="email">E-mail</label>
            <input type="text" name="email" id="email" required>

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
            Esqueceu a senha? <a href="alterarSenha.php">Alterar senha</a>
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

error_reporting();
/// session_start inicia a sessão 
require('conexao.php');
session_start();
$email = $_POST['email'];
$senha = $_POST['senha'];
// If form submitted, insert values into the database.
if (isset($_POST['enviar'])){
        // removes backslashes
	        $query = "SELECT * FROM `usuario` WHERE email='$email'
and senha='".$senha."'";
	$result = mysqli_query($con,$query);
	$rows = mysqli_num_rows($result);
	
        if($rows==1){
			  $_SESSION['email'] = $email;
            // redireciona para o post.php
	    header("Location: post.php");
         }else{

    echo "<script>
    alert('Não possível entrar: E-mail ou senha estão errados, ou não existe!');
    window.location='login.php';
    </script>";

	}
	
	
}
?>


</body>
</html>