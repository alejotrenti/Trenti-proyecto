<!DOCTYPE html>
<html>
<head>
	<title>Log In</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <?php if (isset($error)): ?>
    <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>
    <form action="login2.php" method="post">
        <h3>Log In</h3>
        <label for="username">Usuario</label>
    	<input id="username" type="text" name="name" placeholder="Usuario">

        <label for="password">Contraseña</label>
    	<input id="password" type="password" name="contra" placeholder="Contraseña">
    	
        <input type="submit" name="register" >

        <div class="social">
            <a style="  text-decoration: none;" href=".//login_google/index.php"><div class="go"><i class="fab fa-google" ></i> Google</div></a>
        </div>  
        <br>
            <a href="registrarse.php" class="button">Crear usuario</a><br>
            <a href="newpassword.php" class="button">Olvido su contraseña?</a><br>
    </form>

	
</body>
</html>
