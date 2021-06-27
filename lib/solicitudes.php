<?php
/**
 * Created by IntelliJ IDEA.
 * User: leonardo
 * Date: 22/01/2020
 * Time: 11:29 AM
 */

include "FunGen.php";
include "mail.php";

if(isset($_GET["email"]))
{

    $result=0;

    $mailAddr=$_GET["email"];

    if($_GET['bnd']==1){//aceptar solicitud
        $tipo = $_GET['tipo'];


        switch ($tipo){
            case 1:
                $sql = "UPDATE dependientes SET activo = 1 WHERE correo = '".decodifica($_GET["email"])."' ";
                $result=ejecutarActualizacion($sql);
                $mailMensage="Estimado Usuario, su solicitud ha sido validada por el tutor";  
                break;
            case 2:
                $sql = "UPDATE academicos SET activo= 1 WHERE correo =  '".decodifica($_GET["email"])."' ";
                $result=ejecutarActualizacion($sql);
                $mailMensage="Estimado Usuario, su solicitud ha sido aprobada";  
                break;
            case 3:
                $sql = "UPDATE profesionales SET activo= 1 WHERE correo =  '".decodifica($_GET["email"])."' ";
                $result=ejecutarActualizacion($sql);
                $mailMensage="Estimado Usuario, su solicitud ha sido aprobada";  
                break;
        }
    
    $mailSubject="Solicitud validada";
   
    
    }

    
    else if($_GET['bnd']==2)//rechazar solicitud
    {
        $tipo = $_GET['tipo'];
        switch ($tipo){
            case 1:
                $sql = "DELETE FROM dependientes WHERE correo = '".decodifica($_GET["email"])."' ";
                $result=ejecutarActualizacion($sql);
                break;
            case 2:
                $sql = "DELETE FROM academicos  WHERE correo =  '".decodifica($_GET["email"])."' ";
                $result=ejecutarActualizacion($sql);
                break;
            case 3:
                $sql = "DELETE FROM profesionales WHERE correo =  '".decodifica($_GET["email"])."' ";
                $result=ejecutarActualizacion($sql);
                break;
        }
    
        $mailSubject="Solicitud no aprobada";
        $mailMensage="Estimado Usuario, Lamentamos informar que su solicitud no ha sido aprobada";
        
    }

    if($result == 1){

        echo "#".$_GET["index"];
        sendNotificationMail($mailAddr, $mailSubject, $mailMensage);
    }
        
    else
        echo "error";
}

?>