<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AGRIDOCE</title>
    <link rel="stylesheet" href="style/cadastro.css">
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
   
      <div class="container1">
        <div class="box1 form-box1">
        <header>CADASTRO</header>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <script>
    function validarForm() {
    var nome = document.getElementById('nome').value;
    var email = document.getElementById('email').value;
    var senha = document.getElementById('senha').value;

    if (nome === '' ||  email === '' || senha === '' ) {
      alert('Por favor, preencha todos os campos.');
      return false;
    } 

    return true;
  }
    </script>


<?php 
include("conexao.php");

if(isset($_POST['submit'])){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $confirmaSenha = $_POST['confirmaSenha']; // Novo campo para a confirmação de senha

    //criptografia de senha
    $senhacripto = password_hash($senha, PASSWORD_DEFAULT);

    // Verifique se a senha e a confirmação de senha são iguais
    if($senha !== $confirmaSenha){
        echo "<div class='message'>
                  <p>A confirmação de senha não corresponde à senha digitada. Tente novamente.</p>
              </div> <br>";
        echo "<a href='javascript:self.history.back()'><button class='btn-login-mg'>Volte</button>";
    } else {
         // Check if email is unique
         $query = "SELECT email FROM usuario WHERE email=?";
         $stmt = $con->prepare($query);
         $stmt->bind_param('s', $email);
         $stmt->execute();
         $result = $stmt->get_result();
 
         if ($result->num_rows != 0) {
             echo "<div class='message'>
                       <p>Este e-mail já está cadastrado, use outro por favor!</p>
                   </div> <br>";
             echo "<a href='javascript:self.history.back()'><button class='btn-login mg'>Volte</button></a>";
        } else {
            $query = "INSERT INTO usuario (nome, email, senha) VALUES (?, ?, ?)";
            $stmt = $con->prepare($query);
            $stmt->bind_param('sss', $nome, $email, $senhacripto);

            if ($stmt->execute()) {
                $_SESSION['nome'] = $nome;
                $_SESSION['email'] = $email;

                echo "<div class='message'>
                          <p>Cadastro concluído!</p>
                      </div> <br>";
                echo "<a href='login.php'><button class='btn-login mg'>Login</button></a>";
        
            }
        }
    }
} else {

?>



            <form action="" method="post">
                <div class="field1 input1">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome" autocomplete="off" required>
                </div>

                <div class="field1 input1">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="field1 input1">
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" id="senha" autocomplete="off" required>
                </div>

                <div class="field1 input1">
                     <label for ="confirmaSenha" >Confirmar senha</label>
                     <input type="password" name="confirmaSenha" id="confirmaSenha"autocomplete="off" required>
                </div>

                <div class="field1">
                    
                    <input type="submit" class="btn-login1" name="submit" value="Cadastrar" required>
                </div>
                <div class="links1">
                    Já é membro? <a href="login.php">Sign In</a>
                </div>
            </form>
        </div>
        <?php } ?>
      </div>
</body>
</html>