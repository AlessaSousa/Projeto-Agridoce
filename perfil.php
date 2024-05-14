<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AGRIDOCE</title>
    <link rel="stylesheet" href="style/perfilStyle.css">
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
    <div class="nav">
        <div class="right-links">

            <?php            
            require("conexao.php");
            session_start();
            if(isset($_SESSION['$nome']) && isset($_SESSION['email'])){
                $nome = $_SESSION['nome'];
                $email = $_SESSION['email'];

            }else{
                $nome = "Nome não disponível";
                $email = "E-mail não disponível";
            }
            ?>
            <a href = "sair.php"> <button class="btn">Sair</button></a>
        </div>
    </div>

    <main>
        <div class="main-box top">
            <div class ="top">
                <div class="box">
                Nome
                <?php echo $nome ?>
            </div>

            <div class="box">
                E-mail
                <?php echo $email ?>
            </div>
        </div>
        </div>
    </main>
</body>
</html>