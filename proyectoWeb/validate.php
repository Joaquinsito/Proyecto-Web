<?php
    include'conectarse.php';
    $usuario = $_POST['loginuser'];
    $password = $_POST['loginpass'];
    $typeuser;
    $query;

    function buscar($user, $pass){
      
        $db = conectarse();
        if($user >= 1000 && $user < 2000){
            $query = "select * from doctores where idDoctor = '$user' and passwordDoc = '$pass'" ;
            $typeuser = 'Doctor';
        }else if($user >= 2000 && $user <3000){
            $query = "select * from pacientes where idPaciente = '$user' and password = '$pass'" ;
            $typeuser = 'Paciente';
        }else if($user >=4000){
            $query = "select * from vendedores where idVendedor = '$user' and password = '$pass'" ;
            $typeuser = 'Vendedor';
        }else if($user == 2){
            $query = "select * from admin where idUsuario = '$user' and password = '$pass'" ;
            $typeuser = 'Admin';
        }
        $result = $db->query($query);
        if ($result->num_rows == 1){
            session_start();
            $_SESSION['id'] = session_id();
            $row = $result->fetch_array();
                if($typeuser == 'Doctor'){
                    $_SESSION['idDoctor'] = $row['idDoctor'];
                    $_SESSION['nombre'] = $row["nombre"];
                    $_SESSION['apellidoPaterno'] = $row["apellidoPaterno"];
                    $_SESSION['apellidoMaterno'] = $row["apellidoMaterno"];
                    $_SESSION['especialidad'] = $row["especialidad"];
                }else if($typeuser == 'Paciente'){
                    $_SESSION['idPaciente'] = $row['idPaciente'];
                    $_SESSION['nombre'] = $row["nombre"];
                    $_SESSION['apellidoPaterno'] = $row["apellidoPaterno"];
                    $_SESSION['apellidoMaterno'] = $row["apellidoMaterno"];
                
                }else if($typeuser == 'Vendedor'){
                    $_SESSION['idVendedor'] = $row['idVendedor'];
                    $_SESSION['nombre'] = $row['Nombre'];
                }else if($typeuser == 'Admin'){
                    $_SESSION['nombre'] = $row["nombre"];
                }
            

            switch($typeuser){
                case "Admin": header("Location: admin/pagadmin.php"); break;
                case "Doctor": header("Location: doctores/doctores.php"); break;
                case "Paciente": header("Location: pacientes/paciente.php"); break;
                case "Vendedor": header("Location: vendedor/farmacia.php"); break;
            }
        
        }else{
            header('Location: login.php');
            
        }
    }

buscar($usuario, $password);

?>
