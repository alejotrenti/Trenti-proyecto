<!DOCTYPE html>
<html>
<head>
    <title>New password</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="center">
        <?php
        include("db.php");
        if (isset($_POST['email'])) {
            $email = mysqli_real_escape_string($conex, $_POST['email']);
            $sSql = "SELECT email FROM datos WHERE email = '$email'";
            $result = mysqli_query($conex, $sSql);
            if (mysqli_num_rows($result) == 1) {
              ?>
                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                <input type="hidden" name="email" value="<?php echo $email;?>">
                <label for="contranew">Contraseña</label>
               
                <input type="password" name="contranew"> <br>
                <input type="submit" value="Actualizar">
                </form>
                <?php
            } else {
                $message = "Email incorrecto/a.\\nPrueba de nuevo";
                echo "<script type='text/javascript'>alert('$message');</script>";
                ?>
                <form>

                <br>
                <a href="newpassword.php">Volver</a> <br>

                </form>
                <?php
            }
        } else {
           ?>
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                <h1>Recupere su contraseña</h1>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
                <button type="submit">Recuperar contraseña</button>
                <br><br><br>
                <br><br><br>
                <br><br><br>
                <br><br><br>
                <a href="index.php">Volver al Log In</a>
            </form>
            <?php
        }

        if (isset($_POST['contranew'])) {
            $email = mysqli_real_escape_string($conex, $_POST['email']);
            $contranew = password_hash($_POST["contranew"], PASSWORD_DEFAULT);
            $sSql = "UPDATE datos SET contra='$contranew' WHERE email = '$email'";
            if (mysqli_query($conex, $sSql)) {
                $message = "Contraseña actualizada.";
                echo "<script type='text/javascript'>alert('$message');</script>";
                ?>
                <form>
                <br>
                <a href="newpassword.php">Volver</a> <br>
                </form>
                <?php
            } else {
                echo "Error al actualizar contraseña: ". mysqli_error($conex);
            }
        }

        mysqli_close($conex);
       ?>
    </div>
   
</body>
</html>