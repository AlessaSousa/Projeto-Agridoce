<?php
session_start();
include ("conexao.php");
if (isset($_GET['receita']) && is_numeric($_GET['receita'])) {
    $receita = ($_GET['receita']); // Sanitize input by casting to integer

    // Prepare SQL query
    $query = "SELECT titulo, nome, foto, descricao FROM receita INNER JOIN usuario on autor = cod WHERE rec_cod = ?";
    
    // Prepare statement
    if ($stmt = mysqli_prepare($con, $query)) {
        // Bind parameters
        mysqli_stmt_bind_param($stmt, "i", $receita);

        // Execute query
        mysqli_stmt_execute($stmt);

        // Bind result variables
        mysqli_stmt_bind_result($stmt, $titulo, $nome, $foto, $descricao);

        // Fetch the result
        if (mysqli_stmt_fetch($stmt)) {
            // Close statement
            mysqli_stmt_close($stmt);
            ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AGRIDOCE</title>
    <link rel="stylesheet" href="style/receita.css">
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
    <div class="box-top">
    </div>

<div class="logo"><a href="login.php">AGRIDOCE</a></div>
<div class="icon-voltar">
            <a href ="feed.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-90deg-left" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M1.146 4.854a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H12.5A2.5 2.5 0 0 1 15 6.5v8a.5.5 0 0 1-1 0v-8A1.5 1.5 0 0 0 12.5 5H2.707l3.147 3.146a.5.5 0 1 1-.708.708z"/>
</svg></a>
        </div>        

    <script>
        function abrirReceita(url) {
            window.location.href = url;
        }
    </script>
    <!-- script pra inserir as receitas num loop while
         basicamente, quando uma receita é feito no perfil.php
         a receita vai pro banco de dados e uma query é feita
         no início da página pra resgatar os posts e exibí-los aqui
    -->
    <div class="card">
        <div class="post">
            <p>Postada por <b><?php echo htmlspecialchars($nome); ?></b></p>
            <h2><?php echo htmlspecialchars($titulo); ?></h2>
            <img src="<?php echo htmlspecialchars($foto); ?>" alt="<?php echo htmlspecialchars($titulo); ?>" style="max-width: 500px;">
            <p><?php echo nl2br(htmlspecialchars($descricao)); ?></p>
        </div>
    </div>
</body>
<?php
        } else {
            echo "Receita não encontrada";
        }
    } else {
        echo "Erro no SQL";
    }
} else {
    echo "Receita com código inválido";

}
?>
</html>