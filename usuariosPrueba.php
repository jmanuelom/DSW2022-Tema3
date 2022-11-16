<?php
 setlocale(LC_ALL, "es_ES.UTF-8");
 $conn = mysqli_connect('db', 'root', 'test', "tema3");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USUARIOS</title>
</head>
<body>
    <?php 
    $nameError = "";
    $dateError = "";
    if(isset $_POST['send']) {
        if(isempty($_POST['name'])) $nameError = "Campo de nombre vacío";
        if(isempty($_POST['date'])) $dateError = "Campo de fecha vacío";
        if(strlen($nameError > 0 || $dateError > 0)) {
            echo "No se puede insertar un usuario sin nombre o sin fecha";
        } else {
        $name = $_POST['name'];
        $date = $_POST['date'];
        $active = isset($_POST['active']) ? 1 : 0;
        $query = "INSERT INTO usuarios (id, nombre, fecha, activo) VALUES (null, '$name', '$date', '$active')";
        $result = conn -> query($query);
        if($result) {
            echo "Se ha insertado el usuario correctamente";
        } else {
            echo "Ha habido un error en la introducción del usuario";
            echo "<pre> $query </pre>";
        }
        }
    }
    ?>
    <h2>Listado de usuarios</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Fecha</th>
                <th>Activo</th>
            </tr>
        </thead>
        <tbody>
    <?php 
        $query = "SELECT * FROM usuarios";
        $users = $conn -> query($query);
        while($user -> $users(fetch_assoc())) {
            $date = date_create_from_format(Y-m-d, $user['fecha']);
            $active = $user['activo'] == 1 ? 'Sí' : 'No';
    ?>
        <tr>
            <td><?=$user['id']?></td>
            <td><?=$user['name']?></td>
            <td><?=strftime('%A, %e de %B de %Y', date_timestamp_get($date));?></td>
            <td><?=$active?></td>
        </tr>
    <?php
        }
        $users -> close();
        $conn -> close();
    ?>
        </tbody>
    </table><br>
    <h2>Insertar Usuario</h2>
    
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
        <h2>Introducción de usuario</h2>
        <label for="name">Name: <input type="text" name="name" id="name"></label><br>
        <label for="date">Date: <input type="date" name="date" id="date"></label><br>
        <label for="activo">Activo: <input type="checkbox" name="activo" id="activo"></label><br>
        <input type="submit" value="send" name="send">
    </form>
</body>
</html>