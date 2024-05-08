<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AGRIDOCE</title>
    <link rel="stylesheet" href="style/postStyle.css">
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

    <div class="logo"> <a href="login.php">AGRIDOCE</a></div>

    <div class="container-p">
    <div class="box-p form-box-p">

    <header>Ingredientes
  <!-- <div class="field-p">
        <button class="btn-login-p" type="submit" >Save</button>
    </div> -->
    </header>
    <form action="#" method="POST">
        <div class="field-p input-p">
            <input type="text" name="adc" placeholder="Acrescente o ingrediente" required>
        </div>
        <div class="field-p">
            <button class="btn-login-p" type="submit" >+</button>
        </div>
    </form>
    </div>
    </div>
    <div class="container-img">
    <div class="box-p form-box-img">

    <header>Modo de preparo</header>
    <form action="#" method="POST">
        <div class="field-img input-img">
            <input type="text" name="adc" placeholder="" required>
        </div>
        <div class="field-img">
            <button class="btn-login-p" type="submit" >+</button>
        </div>
    </form>
    
    </div>
    </div>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["adc"])) {
             $novoIngrediente = $_POST["adc"];
            echo "<li>$novoIngrediente</li>";
                }
        ?>
</body>
</html>