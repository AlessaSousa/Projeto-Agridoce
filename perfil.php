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
   <div class="box-left">
    
   </div>
   <header>PERFIL</header><!--
    <div class="perfil-foto">
        <input type="file" id="perfilFotoInput" accept="image/*" style="display: none;">
        <label for="perfilFotoInput" class="perfil-foto-label">
            <svg class='svg' xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-image" viewBox="0 0 16 16">
            <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/>
            <path d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1z"/>
            </svg></label>
                </div>-->
   <div class="content">
   <div class="logo"><a href="feed.php">AGRIDOCE</a></div>
            <?php
            session_start();
            require("conexao.php");
            if(isset($_SESSION['nome'])){
                $nome = $_SESSION['nome'];
            }else{
                $nome = "Nome não disponível";
            }
            ?>
            <a href = "sair.php"> <button class="btn"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z"/>
            <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708z"/>
            </svg></button></a>
        </div>

    <main>
        <div class="main-box top">
            <div class ="top">
                <p>Olá</p>
                <div class="box">
                <?php echo $nome?>
            </div>
        </div>
        </div>

    <!-- formulário para inserção de receitas novas
         o css é com a alê emoji joinha
    -->
    <div class="container-p">
        <div class="box-p form-box-p">
        <h2>Publique sua receita</h2><br>
        <form action="postar_receita.php" method="POST" enctype="multipart/form-data">
        <div class="field-p input-p">
        <input type="text" name="titulo" placeholder="Título" oninput="resizeInput()" required>
        </div>
        <br>
        <textarea name="descricao" id="descricao" placeholder="Insira a descrição da receita" required></textarea>
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
      <script>
        function resizeInput() {
            var input = document.getElementById('inserir-receita');
            input.style.height = (input.value.length + 1) * 10 + 'px';
        }
    </script>
    </div>     
</main>
</body>
</html>