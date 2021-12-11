<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="css/menu.css" rel="stylesheet" type="text/css">
    <link href="css/formulario.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav id="menu">
        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="registro.php">Registrarse</a></li>
            <li><a href="login.php">Log in</a></li>
        </ul>
    </nav>

    <form action="validate.php" method="POST">
        <h1>Log in</h1>
        <hr><br>
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-4 col-form-label">Usuario</label>
            <div class="col-sm-6">
                <input type="text" name="loginuser" class="form-control" id="colFormLabel" placeholder="Ingrese su ID" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-4 col-form-label">Contraseña</label>
            <div class="col-sm-6">
                <input type="password" name="loginpass" class="form-control" id="colFormLabel" placeholder="Escriba su contraseña" required>
            </div>
        </div>
        <br>
        <div class="form-group row" style="text-align: center;">
            <div class="col-sm-12">
                <input type="submit" value="Login" class="btn btn-primary">
            </div>
        </div>
    </form>
</body>
<script src="js/bootstrap.bundle.min.js"></script>
</html>