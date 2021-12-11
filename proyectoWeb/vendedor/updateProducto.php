<?php
session_start();
$valid_session = isset($_SESSION['id']) ? $_SESSION['id'] === session_id() : FALSE;
if(!$valid_session){
    header("Location: login.php");
    exit();
}
?>
<?php
    $idProducto = $_POST['idProducto'];
    $nombreProducto = $_POST['nombreProducto'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];

    include '../conectarse.php';
    $conn=conectarse();

    $sql = "update productos set 
    nombreProducto = '".$nombreProducto."', 
    descripcion = '".$descripcion."', 
    precio = '".$precio."',
    stock = '".$stock."' where idProducto = '".$idProducto."';";

    if($conn->query($sql)){
        echo "<script>alert('Producto modificado')</script>";
        echo "<script>window.location.href='consultarproducto.php'</script>";
    }else{
        echo "<script>alert('Error al modificar')</script>";
        echo "<script>window.location.href='consultarProductp.php'</script>";
    }



?>
