<?php
/**
 * Created by IntelliJ IDEA.
 * User: leonardo
 * Date: 09/06/2019
 * Time: 10:21 PM
 */


//Consulto los permisos a los que tiene acceso el usuario, y en base a esto arma el menu
	session_start();
    if ( ! isset($_SESSION['email']))
    {
        header ("Location: ../index.php");
        exit;
    }else{
        $email = $_SESSION['email'];
        $nombre = $_SESSION['nombres'];
        $apellidoPaterno  = $_SESSION['apellidoP'];
        $apellidoMaterno  = $_SESSION['apellidoM'];
        $typeUser = $_SESSION['typeUser'];
    }
?>