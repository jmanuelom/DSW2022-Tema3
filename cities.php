<?php
  @$link = new mysqli('db', 'root', 'test', 'world');
  $error = $link -> connect_errno;
  echo ($error);
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
  <title>cities</title>
  <style>
    table {
      border-collapse: collapse;
      text-align: center;
    }
    th {
      background-color: navy;
      color: white;
    }
    td, th {
      border: 1px solid navy;
      padding: 2px 8px;
    }

    td:nth-child(5) {
      text-align: right;
    }

    tr:nth-child(odd) {
      background-color: aquamarine;
    }
    </style>
</head>
<body>
  <h1>Cities of the world</h1>  
  <table>
    <thead>
      <tr>
        <th>id</th>
        <th>Name</th>
        <th>Country</th>
        <th>District</th>
        <th>Population</th>
      </tr>
    </thead>
    <tbody>
<?php 
  $limit ="";
  if (isset($_GET['n'])){
    $limit = " LIMIT " . $_GET['n'];
  }
  $sql = "SELECT * FROM city LIMIT $limit";
  $link -> query($sql);
  $result = $link -> query($sql);
  $row = $result -> fetch_array();
  while ($row != null) {
?>  
      <tr>
        <td><?=$row['ID']?></td>
        <td><?=$row['Name']?></td>
        <td><?=$row['CountryCode']?></td>
        <td><?=$row['District']?></td>
        <td><?=$row['Population']?></td>
      </tr>
<?php 
  $row = $result-> fetch_array();
  }
?>  
    </tbody>  
  </table>
</body>
</html>