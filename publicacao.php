
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AGRIDOCE</title>
    <link rel="stylesheet" href="style/publicacao.css">
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
  
<div class="logo"><a href="feed.php">AGRIDOCE</a></div>

<div class="container-p">
        <div class="box-p form-box-p">
        <h2>Publique sua receita </h2><br>
        <form action="postar_receita.php" method="POST" enctype="multipart/form-data">
        <div class="field-p input-p">
        <input type="text" name="titulo" placeholder="Título" oninput="resizeInput()" required>
        </div>
        <br>
        <div class="field-p">
        <textarea name="descricao" id="descricao" placeholder="Insira a descrição da receita" required></textarea>
        </div>
        <br>
        
        <label for="imagem">Insira uma imagem da sua receita</label><br>
        <input type="file" name="imagem">
        <br>
        <div class="field-p">
            <button class="btn-login" id="btn" type="submit" title="Adicione">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-square" viewBox="0 0 16 16">
                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                <path d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z"/>
                </svg>
            </button>
      </div>
        </div>
      </form>
          <!-- formulário para inserção de receitas novas
         o css é com a alê emoji joinha
    -->
      <script>
        function resizeInput() {
            var input = document.getElementById('inserir-receita');
            input.style.height = (input.value.length + 1) * 10 + 'px';
        }
    </script>
    </div>  
    </body>
    </html>