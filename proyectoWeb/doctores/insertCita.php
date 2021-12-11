<?php
session_start();
$valid_session = isset($_SESSION['id']) ? $_SESSION['id'] === session_id() : FALSE;
if(!$valid_session){
    header("Location: login.php");
    exit();
}
?>

<?php
    $idPaciente = $_POST['idPaciente'];
    $idDoctor = $_SESSION['idDoctor'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $consultorio = $_POST['consultorio'];
    $contador=0;
    include '../conectarse.php';
    $conn = conectarse();
    
    // $sql = "select * from citas where idDoctor = '".$idDoctor."'";
    // $result = $conn->query($sql);
    // if($result->num_rows > 0){
    //     while($row = mysqli_fetch_array($result)){
    //         if($row['fecha'] == $datefinal){
    //             echo "<script>alert('Hora Ocupada')</script>";
    //             echo "<script>window.location.href='nuevaCitaDoc.php'</script>";
    //         }
    //         $contador++;
    //     }
    // }
    $sql = "insert into citas2 (idDoctor, idPaciente, fecha, hora,consultorio) values
    ('$idDoctor', '$idPaciente', '$fecha', '$hora','$consultorio');";

    if($conn->query($sql)){
        echo "<script>alert('Cita creada')</script>";
        echo "<script>window.location.href='nuevaCitaDoc.php'</script>";
    }else{
        echo "<script>alert('Error al crear')</script>";
        echo "<script>window.location.href='nuevaCitaDoc.php'</script>";
    }

?>