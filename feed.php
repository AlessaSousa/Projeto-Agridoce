<?php
session_start();
include ("conexao.php");
$query = "SELECT rec_cod, titulo, nome, foto, descricao FROM receita inner join usuario on autor = cod ORDER BY receita.rec_cod DESC";
$resultado = mysqli_query($con, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AGRIDOCE</title>
    <link rel="stylesheet" href="style/feed.css">
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
       


     <div class="icon-perfil">
            <a href ="perfil.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
         <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
         <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
        </svg></a>
        </div>        

        <div class="pub"><a href="publicacao.php">
            Publique sua receita <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-chat-left-heart" viewBox="0 0 16 16">
            <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
            <path d="M8 3.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132"/>
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
    <?php while ($post = mysqli_fetch_assoc($resultado)): ?>
                <div class="card">
                    <a href="receita.php?receita=<?php echo $post['rec_cod']; ?>">Descrição</a>
                <div class="post">
                    <p>Postado por <?php echo htmlspecialchars($post['nome']); ?></p>
                    <!--<p><?php echo nl2br(htmlspecialchars($post['descricao'])); ?></p>-->
                    <?php if ($post['foto']): ?>
                        <img src="<?php echo $post['foto']; ?>" alt="Post Image" style="max-width: 500px;">
                        <h2><?php echo htmlspecialchars($post['titulo']); ?></h2>
                            <?php endif; ?>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
      </div>
    </div>
</body>
</html>