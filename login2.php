<?php
session_start(); 
$conex = mysqli_connect("localhost", "root", "", "registro"); 

$usuario = $_POST['name'];
$password = $_POST['contra'];

$sql = "SELECT * FROM datos WHERE nombre = '$usuario'";
$result = mysqli_query($conex, $sql);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $hashedPassword = $row['contra'];

    if (password_verify($password, $hashedPassword)) {
        $_SESSION["nombre"] = $usuario;
        header("Location: success.php");
        exit; 
    } else {
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <link rel="preconnect" href="https://fonts.gstatic.com">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
            <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
            <link rel="stylesheet" type="text/css" href="style.css">
        </head>
        <body>
            <form>
                <div>
                    <h1>Contraseña incorrecta</h1>
                    <h3>Pruebe de nuevo</h3>
                    <a href="index.php">Volver</a>
                </div>
            </form>
        </body>
        </html>
        <?php
        exit; 
    }

} else {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <form>
            <div>
                <h1>Usuario no encontrado</h1>
                <h3>Verifique el nombre de usuario</h3>
                <a href="index.php">Volver</a>
            </div>
        </form>
    </body>
    </html>
    <?php
}

mysqli_close($conex);
?>
