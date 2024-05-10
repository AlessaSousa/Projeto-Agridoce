<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   

<title>Alterar Senha</title>
    <link rel="stylesheet" href="style/alterarSenha.css">
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
  
    <div class="container-alt"> 
        <div class="box-alt form-box-alt">
            <header>ALTERAR SENHA</header>
            <form action="" method="post">
                <div class="field-alt input-alt">
                    <label for="email">E-mail</label>
                    <input type="text" name="email" id="email" required>
                </div>
                <div class="field-alt input-alt">
                    <label for="senha">Senha Antiga</label>
                    <input type="password" name="senha" id="senha" required>
                </div>
                <div class="field-alt input-alt">
                    <label for="nova_senha">Nova Senha</label>
                    <input type="password" name="nova_senha" id="nova_senha" required>
                </div>
                <div class="field-alt">
                    <input type="submit" class="btn-login-alt" name="alterar_senha" value="Alterar Senha">
                </div>
                <div class="links-alt">
                    Faça seu login <a href="login.php">Sign In</a>

                </div>
            </form>
        </div>
    </div>

    <?php
    // Verificar se o formulário foi enviado
    if (isset($_POST['alterar_senha'])) {
        // Conexão com o banco de dados
        require('conexao.php');
        session_start();

        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $nova_senha = $_POST['nova_senha'];

        // Verificar se o e-mail e a senha antiga coincidem
        $query = "SELECT * FROM usuario WHERE email='$email' AND senha='$senha'";
        $result = mysqli_query($con, $query);
        $rows = mysqli_num_rows($result);

        if ($rows == 1) {
            // Atualizar a senha no banco de dados
            $update_result = mysqli_query($con, "UPDATE usuario SET senha='$nova_senha' WHERE email='$email'");

            if ($update_result) {
                echo "<script>alert('Senha alterada com sucesso!');</script>";
            } else {
                echo "<script>alert('Erro ao alterar a senha. Tente novamente mais tarde.');</script>";
            }
        } else {
            echo "<script>alert('E-mail ou senha antiga incorretos.');</script>";
        }
    }
    ?>
</body>
</html>
