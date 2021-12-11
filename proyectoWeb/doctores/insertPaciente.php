<?php
    $nombre = $_POST['nombre'];
    $aPaterno = $_POST['ap'];
    $aMaterno = $_POST['am'];
    $edad = $_POST['edad'];
    $mail = $_POST['mail'];
    $password = $_POST['password'];


    include '../conectarse.php';
    $conectarse=conectarse();
    $sql = "insert into pacientes (nombre, apellidoPaterno, apellidoMaterno, edad, correo, password) values 
    ('$nombre', '$aPaterno', '$aMaterno', '$edad', '$mail', '$password');";
    
    if($conectarse->query($sql)){
        echo "<script>alert('Datos Guardados')</script>";
        echo "<script>window.location.href='doctores.php'</script>";
    }else{
        echo "<script>alert('Error al Guardar')</script>";
        echo "<script>window.location.href='nuevoPaciente.php'</script>";
        
    }
?>