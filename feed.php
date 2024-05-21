<?php
session_start();
include ("conexao.php");
$query = "SELECT titulo, nome, foto, descricao FROM receita inner join usuario on autor = cod ORDER BY receita.rec_cod DESC";
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
       
        <div class="busca">
        <input type="text" id="busca" placeholder="Buscar receitas...">
        <button onclick="pesquisar()"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
        </svg></button>
    </div>  

     <div class="icon-perfil">
            <a href ="perfil.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
         <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
         <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
        </svg></a>
        </div>        
        <header>Feed de Receitas</header>  
        <div class="container">

        <div class="card" onclick="abrirReceita('#')">
        <svg class='svg' xmlns="http://www.w3.org/2000/svg" width="200" height="200" fill="currentColor" class="bi bi-image" viewBox="0 0 16 16">
            <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/>
            <path d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1z"/>
            </svg>
            <img src="" >
            <h2>Bolo de Chocolate</h2>
        </div>

        <div class="card" onclick="abrirReceita('#')">
        <svg class='svg' xmlns="http://www.w3.org/2000/svg" width="200" height="200" fill="currentColor" class="bi bi-image" viewBox="0 0 16 16">
            <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/>
            <path d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1z"/>
            </svg>
            <img src="" >
            <h2>Mousse de Maracujá</h2>
        </div>

            <div class="card" onclick="abrirReceita('#')">
        <svg class='svg' xmlns="http://www.w3.org/2000/svg" width="200" height="200" fill="currentColor" class="bi bi-image" viewBox="0 0 16 16">
            <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/>
            <path d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1z"/>
            </svg>
            <img src="" >
            <h2>X-Caboquinho</h2>
        </div>

            <div class="card" onclick="abrirReceita('#')">
        <svg class='svg' xmlns="http://www.w3.org/2000/svg" width="200" height="200" fill="currentColor" class="bi bi-image" viewBox="0 0 16 16">
            <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/>
            <path d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1z"/>
            </svg>
            <img src="" >
            <h2>Sopa de legumes</h2>
        <!-- Adicione mais cards conforme necessário -->
    </div>

    <script>
        function abrirReceita(url) {
            window.location.href = url;
        }
    </script>
        <div class="container">
            <div class="card">
            <?php while ($post = mysqli_fetch_assoc($resultado)): ?>
                <div class="post">
                    <h2><?php echo htmlspecialchars($post['titulo']); ?></h2>
                    <p>Postada por <?php echo htmlspecialchars($post['autor']); ?></p>
                    <p><?php echo nl2br(htmlspecialchars($post['descricao'])); ?></p>
                    <?php if ($post['imagem']): ?>
                        <img src="<?php echo $post['imagem']; ?>" alt="Post Image" style="max-width: 500px;">
                    <?php endif; ?>
                </div>
                <?php endwhile; 
            ?>
            </div>
        </div>
      </div>
    </div>
</body>
</html>