<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AGRIDOCE</title>
    <link rel="stylesheet" href="style.css">
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
    
    <div class="container1">
    <div class="box1 form-box1">

    <header>CADASTRO</header>
    <form action="" method="post">

        <div class="field1 input1">
            <label for ="name" >Nome</label>
            <input type="name" name="name" id="name" required>

        </div>

        <div class="field1 input1">
            <label for="email">E-mail</label>
            <input type="text" name="email" id="email" required>

        </div>

        <div class="field1 input1">
            <label for ="password" >Senha</label>
            <input type="password" name="password" id="password" required>

        </div>

        <div class="field1 input1">
            <label for ="senha" >Confirmar senha</label>
            <input type="password" name="senha" id="senha" required>

        </div>

        <div class="field1">
            <input type="submit" class="btn-login1" name="enviar" value="Cadastrar" required>
        </div>
        <div class="links1">
            Já possui uma conta? <a href="login.php">Login</a>
        </div>
    </form>
    </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <script>
  function validarForm() {
    var nome = document.getElementById('nome').value;
    var email = document.getElementById('email').value;
    var senha = document.getElementById('senha').value;

    if (nome === '' ||  email === '' || senha === '') {
      alert('Por favor, preencha todos os campos.');
      return false;
    }

    return true;
  }
</script>

</body>

<?php 
error_reporting (0);
 
 include("conexao.php");
 
// RECEBENDO OS DADOS PREENCHIDOS DO FORMULÁRIO !
$nome	= $_POST ["nome"];
$email = $_POST ["email"];
$senha = $_POST ["senha"];
$enviar = $_POST ["enviar"];


//Gravando no banco de dados !
 
//conectando com o localhost - mysql

if (isset($_POST['enviar'])){
    // removes backslashes
$query = "SELECT * FROM `usuario` WHERE email='$email'";
$result = mysqli_query($conect,$query);
$rows = mysqli_num_rows($result);

    if($rows==0){

        $query = "INSERT INTO usuario (cod, nome , email,senha) 
        VALUES ('NULL','$nome', '$email' , '$senha')";
         
        $query = mysqli_query($conect,$query);
        
        echo "<script>
        alert('Seu cadastro foi cadastrado com sucesso!');
        window.location='login.php';
        </script>";
   
     }else{

        echo "<script>
alert('E-mail já é cadastrado!');
window.location='cadastro.php';
</script>";

}


}
	


?> 

</html>
