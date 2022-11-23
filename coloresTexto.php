<?php
if(isset($_POST['send'])){
    setcookie("textColor", $_POST['colorTexto'],  time() + 120);
    setcookie("backColor", $_POST['colorFondo'],  time() + 120);
    setcookie("size", $_POST['size'], time() + 120);
    
}
?> 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    p {
      color:brown;
      background-color: grey;
      font-size: 20px;
    }
  </style>
</head>
<body>
  <?php
    if(isset($_POST['send'])) {
      // $textColor = $_COOKIE['colorTexto'];    
      // $backColor = $_COOKIE['colorFondo'];


    
  } else {?>
  
  <form action="coloresTexto.php" method="post">
  <h1>Inicio</h1><br><br>
    <p>Esto es el texto a cambiar.</p><br><br>
    <label for="colorTexto">Color del texto: <input type="color" name="colorTexto" id="colorTexto"></label><br>
    <label for="colorFondo">Color fondo: <input type="color" name="colorFondo" id="colorFondo"></label><br>
    <label for="tamaño">Tamaño: <input type="range" name="size" id="tamaño"></label><br>
    <input type="submit" value="send" name="send">
  </form>
  <?php } ?>
</body>
</html>