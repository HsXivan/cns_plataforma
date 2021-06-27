<?php
/**
 * Created by IntelliJ IDEA.
 * User: leonardo
 * Date: 20/01/2020
 * Time: 08:33 PM
 */
include("FunGen.php");


if(isset($_POST['btnAcceder'])) {
    if (isset($_POST['txtEmail']) && isset($_POST['txtPassword'])) {
        $usuario = addslashes($_POST['txtEmail']);
        $password = addslashes($_POST['txtPassword']);
        $typeUser = addslashes($_POST['selectTypeUser']);

        if ($usuario != "" && $password != "") {
            $usuario = trim($usuario);
            $password = trim($password);
        }

        validarUsuario($usuario, $password, $typeUser);
    }
}

if(isset($_POST['btnAccederAdmin']))
{
    if (isset($_POST['txtEmail']) && isset($_POST['txtPassword'])) {
        $usuario = addslashes($_POST['txtEmail']);
        $password = addslashes($_POST['txtPassword']);
        $typeUser = addslashes($_POST['selectTypeUser']);

        if ($usuario != "" && $password != "") {
            $usuario = trim($usuario);
            $password = trim($password);
        }

        //Contraseña 1p1cyt-50l1c1tud35
        if($usuario=="CNSAdmin@ipicyt.edu.mx" && md5($password) == "0bb599a269cf1e49862c12d5c06c2cca")
        {
            session_start();
            $_SESSION['email'] = "CNSAdmin@ipicyt.edu.mx";
            $_SESSION['nombres'] = "Administrador";
            $_SESSION['apellidoP'] = "";
            $_SESSION['apellidoM'] = "";
            $_SESSION['typeUser'] = 5;
            header("Location: ../principal.php");
        }else{
            echo $password;
            header("Location: ../adminSession.php?respuesta=3");
        }
    }
}


else{

    if (isset($_POST['txtEmail']) && isset($_POST['txtPassword'])) {
        $usuario = addslashes($_POST['txtEmail']);
        $password = addslashes($_POST['txtPassword']);
       // $typeUser = addslashes($_POST['selectTypeUser']);

        if ($usuario != "" && $password != "") {
            $usuario = trim($usuario);
            $password = trim($password);
        }
    }

    if(!verificaUser($usuario, $password) && $usuario=="CNSAdmin@ipicyt.edu.mx" && md5($password) == "0bb599a269cf1e49862c12d5c06c2cca")
    //if()
    {
        session_start();
        $_SESSION['email'] = "CNSAdmin@ipicyt.edu.mx";
        $_SESSION['nombres'] = "Administrador";
        $_SESSION['apellidoP'] = "";
        $_SESSION['apellidoM'] = "";
        $_SESSION['typeUser'] = 5;
        header("Location: ../principal.php");
    }else{
        echo $password;
        header("Location: ../index.php?respuesta=3");
    }

    //validarUsuario($usuario, $password, $typeUser);
   
}
?>