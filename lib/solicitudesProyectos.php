<?php
/**
 * Created by IntelliJ IDEA.
 * User: leonardo
 * Date: 22/01/2020
 * Time: 11:29 AM
 */

include "FunGen.php";
include "mail.php";

$mailAddr=$_GET["email"];

if(isset($_GET["id"]))
{

    $result=0;
    if($_GET['bnd']==1){//aceptar solicitud       

        $correo = addslashes($_GET["email"]);
        $correo = trim($correo);

        $tipo = $_GET['tipo'];
        //echo "tipo: ".$tipo;        
        switch ($tipo){
            case 1:
                $sql = "UPDATE propuestasdependientes SET estado = 1 WHERE correoDelGestor = '".decodifica($correo)."' AND ID = ".decodifica($_GET['id']);                
                $result=ejecutarActualizacion($sql);
                break;
            case 2:
                $sql = "UPDATE propuestasacademicas  SET estado = 1 WHERE correoDelAcademico  =  '".decodifica($_GET["email"])."' AND DetallesProyectos_ID =".decodifica($_GET['id']);
                $result=ejecutarActualizacion($sql);
                break;
            case 3:
                $sql = "UPDATE propuestasprofesionales SET estado = 1 WHERE correoDelGestor  =  '".decodifica($_GET["email"])."' AND DetallesProyectos_ID =".decodifica($_GET['id']);
                $result=ejecutarActualizacion($sql);
                break;
        }

        $mailSubject="Solicitud aprobada";
        $mailMensage="Estimado Usuario, su solicitud ha sido aprobada"; 



        //$sql = "UPDATE propuestasdependientes SET estado = 1 WHERE correoDelGestor = '".decodifica($correo)."' AND ID = ".decodifica($_GET['id']);
        //$result=ejecutarActualizacion($sql);


    }else if($_GET['bnd']==2)//rechazar solicitud
    {
        $tipo = $_GET['tipo'];
        //echo "tipo: ".$tipo;        
        switch ($tipo){
            case 1:
                $sql = "DELETE FROM propuestasdependientes WHERE correoDelGestor  = '".decodifica($_GET["email"])."' AND DetallesProyectos_ID =".decodifica($_GET['id']);
                $resdep=ejecutarActualizacion($sql);
                break;
            case 2:
                $sql = "DELETE FROM propuestasacademicas  WHERE correoDelAcademico  =  '".decodifica($_GET["email"])."' AND DetallesProyectos_ID =".decodifica($_GET['id']);
                $resdep=ejecutarActualizacion($sql);
                break;
            case 3:
                $sql = "DELETE FROM propuestasprofesionales WHERE correoDelGestor  =  '".decodifica($_GET["email"])."' AND DetallesProyectos_ID =".decodifica($_GET['id']);
                $resdep=ejecutarActualizacion($sql);
                break;
        }
        if($resdep){   
            $sql="DELETE FROM softwarerequeridos WHERE DetallesProyectos_ID  = '".decodifica($_GET['id'])."'";
            if(ejecutarActualizacion($sql)){
                $sql = "DELETE FROM detallesproyectos WHERE ID = '".decodifica($_GET['id'])."'" ;
                $result=ejecutarActualizacion($sql);
                $mailSubject="Solicitud no aprobada";
                $mailMensage="Estimado Usuario, Lamentamos informar que su solicitud no ha sido aprobada";
            }
            else {
                $result=0;
              //  echo "Error en sw req;";
            }
            
        }
        else {
            $result=0;
            //echo "Error en sw propdep;";
        }    
//    $result=1;
    }

    if($result == 1){
        echo "#".$_GET["index"];
        sendNotificationMail($mailAddr, $mailSubject, $mailMensage);       

    }
        
    else
        echo "error";
}

?>