<?php
/**
 * Created by IntelliJ IDEA.
 * User: leonardo
 * Date: 20/01/2020
 * Time: 08:35 PM
 */
include ("FunGen.php");

//print_r($_POST);
//print_r($_FILES);

if (isset($_POST['txtEmail']) && isset($_POST['txtPassword'])) {
    $nombres = addslashes($_POST['txtNombres']);
    $apellidoP = addslashes($_POST['txtApellidoP']);
    $apellidoM = addslashes($_POST['txtApellidoM']);
    $email = addslashes($_POST['txtEmail']);
    $telPersonal = addslashes($_POST['txtTelPer']);
    $telInst = addslashes($_POST['txtTelInst']);
    $tipoUsuario = addslashes($_POST['txtTypeUser']);
    $gradoAcademico = addslashes($_POST['txtGrado']);
    $institucion = addslashes($_POST['txtInstitucion']);
    $pais = addslashes($_POST['txtPais']);
    $password = addslashes($_POST['txtPassword']);
    $correoTutor="";
    $editausuario=addslashes($_POST['editaUsuario']);
    if($tipoUsuario==2||$tipoUsuario==3)
        $correoTutor = addslashes($_POST['txtEmailTutor']);


    if ($email != "" && $password != "") {

        $nombres = trim($nombres);
        $apellidoM = trim($apellidoM);
        $apellidoP = trim($apellidoP);
        $telPersonal = trim($telPersonal);
        $telInst = trim($telInst);
        $tipoUsuario = trim($tipoUsuario);
        $gradoAcademico = trim($gradoAcademico);
        $institucion = trim($institucion);
        $pais = trim($pais);
        $correoTutor = trim($correoTutor);
        $email = trim($email);
        $password = trim($password);

    }

   
   // echo $nombres." ".$apellidoP." ".$apellidoM." ".$telPersonal." ".$telInst." ".$tipoUsuario." ".$gradoAcademico." ".$institucion." ".$pais." ".$correoTutor." ".$email." ".$password;
    
   if(!buscaUser($email)){
       echo "Crear nuevo user!";
        nuevoUsuario($nombres,$apellidoP,$apellidoM,$email,$password,$telPersonal,$telInst, $pais,$gradoAcademico, $institucion, $tipoUsuario, $correoTutor,$_FILES);
   }
   else
   {
      // if($editausuario){
       //    echo "Editar";
       //     editaUsuario($nombres,$apellidoP,$apellidoM,$email,$password,$telPersonal,$telInst, $pais,$gradoAcademico, $institucion, $tipoUsuario, $correoTutor,$_FILES );
      // }
       
   }
    header("Location: ../index.php?respuesta=6");
    
}
?>
