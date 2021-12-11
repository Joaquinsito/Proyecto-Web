<?php
session_start();
$valid_session = isset($_SESSION['id']) ? $_SESSION['id'] === session_id() : FALSE;
if (!$valid_session) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar</title>
    <link href="../css/menu.css" rel="stylesheet" type="text/css">
    <link href="../css/formulario.css" rel="stylesheet" type="text/css">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav id="menu">
        <ul>
            <li><a href="farmacia.php">Home</a></li>
            <li><a href="insertarProductp.php">Insertar productos</a></li>
            <li><a href="eliminarproducto.php">Eliminar productos</a></li>
            <li><a href="consultarproducto.php">Consultar productos</a></li>
            <li><a href="venta.php">Vender</a></li>
            <li><a href="ventasrealizadas.php">Ventas</a></li>
            <li><a href="../exit.php">Salir</a></li>
        </ul>
    </nav>
    <form action="insertarProductp.php" method="POST">
        <h1>Insertar productos</h1>
        <hr>
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-5 col-form-label">Nombre del producto</label>
            <div class="col-sm-6">
                <input type="text" name="nombreP" class="form-control" id="colFormLabel" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-5 col-form-label">Descripción</label>
            <div class="col-sm-6">
                <input type="text" name="descripcion" class="form-control" id="colFormLabel" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-5 col-form-label">Precio</label>
            <div class="col-sm-6">
                <input type="number" name="precio" class="form-control" id="colFormLabel" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-5 col-form-label">Cantidad disponible</label>
            <div class="col-sm-6">
                <input type="number"min=0 name="stock" class="form-control" id="colFormLabel" required>
            </div>
        </div>
        <div class="form-group row" style="text-align: center;">
            <div class="col-sm-12">
                <input type="submit" value="Registrar" name="btn" class="btn btn-primary" required>
            </div>
        </div>
    </form>
</body>

</html>

<?php
if (isset($_POST['btn'])) {
    $nombrep = $_POST['nombreP'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    if ($stock < 0) {
        echo "<script>alert('Error no puede haber numeros negativos')</script>";
        echo "<script>window.location.href='insertarProductp.php'</script>";
    }
    include '../conectarse.php';
    $conn = conectarse();

    $sql = "insert into productos (nombreProducto, descripcion, precio, stock) values
        ('$nombrep', '$descripcion', '$precio', '$stock');";

    if ($conn->query($sql)) {
        echo "<script>alert('Producto agregado')</script>";
        echo "<script>window.location.href='consultarproducto.php'</script>";
    } else {
        echo "<script>alert('Error al agregar')</script>";
        echo "<script>window.location.href='insertarProductp.php'</script>";
    }
}

?>