<?php
@$link = new mysqli('db', 'root', 'test', 'world');
  $error = $link -> connect_errno;
  
  if($error != null) {
    echo "<p>Error número: $error</p>";
    echo "<p>El error dice: $link -> connect_error</p>";
    die(); // Parar la ejecución;
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<?php
    if(isset($_POST['tercero'])){
      $code = $_POST['CountryCode'];
      $sql = "SELECT * FROM countrylanguage WHERE CountryCode = '$code'"; 
      $link -> query($sql);
      $result = $link -> query($sql);
      $row = $result -> fetch_array();
      ?>
      <form action="prueba.php" method="post">
      
      <?php  
      while($row != null){
       
      $language = $row[1];
      $percentage = $row[3];
      echo $language . "<br>"; 
      echo $percentage . "<br>";
      $row = $result-> fetch_array(); 
      } ?>
    </form>
  <?php
    } else if(isset($_POST['segundo'])){
      $code = $_POST['code'];
      $sql = "SELECT * FROM city WHERE CountryCode = '$code'"; 
      $link -> query($sql);
      $result = $link -> query($sql);
      $row = $result -> fetch_array();
      ?>
      <form action="prueba.php" method="post">
      <select name="CountryCode" id="">
      <?php  
      while($row != null){
      ?> 
      <option value="<?=$code?>"><?=$row['District']?></option>
      <?php
       $row = $result-> fetch_array(); 
      } ?>
      </select>
      <button type="submit" name="tercero">Enviar</button>
    </form>
      <?php
    } else if(isset($_POST['primero'])){?>
    <form action="prueba.php" method="post">
    <select name="code" id="">
    <?php
      $continente = $_POST['continente'];
      $sql = "SELECT * FROM country WHERE Continent = '$continente'"; 
      $link -> query($sql);
      $result = $link -> query($sql);
      $row = $result -> fetch_array();
     while($row != null){
    ?>
      <option value="<?=$row['Code']?>"><?=$row['Name']?></option>

    <?php
      $row = $result-> fetch_array(); 
    } ?>
    </select>
    <button type="submit" name="segundo">Enviar</button>
    </form>    
    <?php    
    } else {
  ?>    
    <form action="prueba.php" method="post">
    <select name="continente" id="">
  <?php
    $sql = "SELECT DISTINCT Continent FROM country";
    $link -> query($sql);
    $result = $link -> query($sql);
    $row = $result -> fetch_array();

    while ($row != null) {
      ?>
          
        <option value="<?=$row['Continent']?>"><?=$row['Continent']?></option>
      <?php 
        $row = $result-> fetch_array();
        }
  ?>
  </select>
  <button type="submit" name="primero">Enviar</button>
  </form>
  <?php } ?>
</body>
</html>