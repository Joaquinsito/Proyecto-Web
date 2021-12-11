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
    <title>Eliminar</title>
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
    <form action="eliminarproducto.php" method="POST">
        <h1>Eliminar productos</h1>
        <hr><br>
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-3 col-form-label">Producto</label>
            <select name="idProducto" class="col-sm-7 form-control" required>
                <option>
                    <?php
                    include '../conectarse.php';
                    $conn = conectarse();
                    $sql = "select * from productos;";

                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_array()) {
                            echo "<option value='" . $row['idProducto'] . "'>" . $row['idProducto'] . "," . $row['nombreProducto'] . "";
                            echo "</option>";
                        }
                    }
                    ?>
                </option>
            </select><br>
        </div>
        <br>
        <div class="form-group row" style="text-align: center;">
            <div class="col-sm-12">
                <input type="submit" name="btn" value="Eliminar" class="btn btn-primary">
            </div>
        </div>
    </form>
</body>

</html>

<?php
if (isset($_POST['btn'])) {
    $idProducto = $_POST['idProducto'];
    $sql = "delete from productos where idProducto ='" . $idProducto . "';";
    if ($conn->query($sql)) {
        echo "<script>alert('Producto eliminado')</script>";
        echo "<script>window.location.href='consultarproducto.php'</script>";
    } else {
        echo "<script>alert('Error')</script>";
        echo "<script>window.location.href='eliminarproducto.php'</script>";
    }
}

?>