<?php


/**
 * Created by IntelliJ IDEA.
 * User: leonardo
 * Date: 21/01/2020
 * Time: 02:31 PM
 */

    include_once ("lib/validarPermisos.php");
    include_once ("lib/FunGen.php");

    $option=0;

    if (isset($_GET["respuesta"])) $respuesta = $_GET["respuesta"]; else $respuesta = "";

    switch ($respuesta)
    {
        case "1": $respuesta = "El usuario o contrase&ntilde;a no pueden ir vac&iacute;os"; break;
        case "2": $respuesta = "No has iniciado tu sesi&oacute;n o bien ha expirado. Autentificate"; break;
        case "3": $respuesta = "El nombre de usuario o contrase&ntilde;a son incorrectos"; break;
        case "4": $respuesta = "El registro fue exitoso, espera la respuesta de la autorizaci&oacute;n"; break;
        case "5": $respuesta = "Tu registro sigue pendiente de aprobaci&oacute;n"; break;
        case "6":$respuesta="Formulario subido exitosamente"; break;
        case "7":$respuesta="Error en alta!!"; break;

    }


    if(isset($_GET["option"]))
        $option=$_GET["option"];

    require_once('common/header.php');

    if ($option == 0) {

        $solicitudes = numeroSolicitudesDeEstudiantes($email);
        $estudiantesActivos = numeroDeEstudiantes($email);

        $rowSolicitudes = mysqli_fetch_row($solicitudes);
        $rowEstActivos = mysqli_fetch_row($estudiantesActivos);

        $rowSolicitudesInvestigadores = mysqli_fetch_row(numeroSolicitudesDeInvestigadores());
        $rowInvestigadoresActivos = mysqli_fetch_row(numeroDeInvestigadores());

        $rowSolicitudesProfesionales = mysqli_fetch_row(numeroSolicitudesDeProfesionales());
        $rowProfesionalesActivos = mysqli_fetch_row(numeroDeProfesionales());

        ?>
        <!-- Intro -->
        <div class="container">        

            <div class="row" style="margin-top: 7em;">     


             <?php
            if ($respuesta != ""){
                ?>

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Mensaje |</strong> <?php echo " ".$respuesta;?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
            }?>
            </div><div class="row">

          


           <?php 
           if($typeUser==1){?>
                <div class="col-md-6">
                    <div class="card" style="background-color: #5d4267;">
                        <h3 class="m-2 p-2" style="color: white; width: 100%;">Mis estudiantes</h3>
                        <!-- Card content -->
                        <div class="card-body" style="background-color: white;">
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="principal.php?option=2" aria-expanded="false" 
                                    style="color: black; text-decoration: none;"> 
                                    <span class="spanNumber"><?php  echo $rowSolicitudes[0];  mysqli_free_result($solicitudes);?></span> Solicitudes</a>
                                </div>
                                <div class="col-md-12">
                                    <div class="mt-3 mb-3" style="width: 100%; height: 1px; background-color: lightgrey;"></div>
                                    <a href="principal.php?option=3" aria-expanded="false" style="color: black; text-decoration: none;"> <span class="spanNumber"><?php echo $rowEstActivos[0]; mysqli_free_result($estudiantesActivos);?></span> Activos</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php }

                if($typeUser!=5){
                    $conteoProyectos = mysqli_fetch_row(numeroDeMisProyectos($email,$typeUser));
                    ?>

                <div class="col-md-6">
                    <div class="card" style="background-color: #5d4267;">
                        <h3 class="m-2 p-2" style="color: white; width: 100%;">Proyectos</h3>
                        <!-- Card content -->
                        <div class="card-body" style="background-color: white;">
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="principal.php?option=10" aria-expanded="false" style="color: black; text-decoration: none;"> <span class="spanNumber"><i class='far fa-folder'></i></span> Crear nuevo</a>
                                </div>
                                <div class="col-md-12">
                                    <div class="mt-3 mb-3" style="width: 100%; height: 1px; background-color: lightgrey;"></div>
                                    <a href="principal.php?option=11" aria-expanded="false" style="color: black; text-decoration: none;"> <span class="spanNumber"><?php echo $conteoProyectos[0];?></span> Propios</a>
                                </div>
                                <div class="col-md-12">
                                    <div class="mt-3 mb-3" style="width: 100%; height: 1px; background-color: lightgrey;"></div>
                                    <a href="principal.php?option=12" aria-expanded="false" style="color: black; text-decoration: none;"> <span class="spanNumber">0</span> Colaboración</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                }

                if($typeUser==5){
                ?>                        
                <div class="col-md-6">
                    <div class="card" style="background-color: #5d4267;">
                        <h3 class="m-2 p-2" style="color: white; width: 100%;">Profesores-Investigadores</h3>
                        <!-- Card content -->
                        <div class="card-body" style="background-color: white;">
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="principal.php?option=4" aria-expanded="false" style="color: black; text-decoration: none;"> <span class="spanNumber"><?php  echo $rowSolicitudesInvestigadores[0];  ;?></span> Solicitudes</a>
                                </div>
                                <div class="col-md-12">
                                    <div class="mt-3 mb-3" style="width: 100%; height: 1px; background-color: lightgrey;"></div>
                                    <a href="principal.php?option=5" aria-expanded="false" style="color: black; text-decoration: none;"> <span class="spanNumber"><?php echo $rowInvestigadoresActivos[0];?></span> Activos</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card" style="background-color: #5d4267;">
                        <h3 class="m-2 p-2" style="color: white; width: 100%;">Profesionales</h3>
                        <!-- Card content -->
                        <div class="card-body" style="background-color: white;">
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="principal.php?option=6" aria-expanded="false" style="color: black; text-decoration: none;"> <span class="spanNumber"><?php  echo $rowSolicitudesProfesionales[0];  ;?></span> Solicitudes</a>
                                </div>
                                <div class="col-md-12">
                                    <div class="mt-3 mb-3" style="width: 100%; height: 1px; background-color: lightgrey;"></div>
                                    <a href="principal.php?option=7" aria-expanded="false" style="color: black; text-decoration: none;"> <span class="spanNumber"><?php echo $rowProfesionalesActivos[0];?></span> Activos</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" style="margin-top: 3em;">
                <div class="col-md-6 mt-3">
                    <div class="card" style="background-color: #5d4267;">
                        <h3 class="m-2 p-2" style="color: white; width: 100%;">Proyectos</h3>
                        <!-- Card content -->
                        <div class="card-body" style="background-color: white;">
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="principal.php?option=8" aria-expanded="false" style="color: black; text-decoration: none;"> <span class="spanNumber"><?php  echo numeroSolicitudesDeProyectos();  ?></span> Solicitudes</a>
                                </div>
                                <div class="col-md-12">
                                    <div class="mt-3 mb-3" style="width: 100%; height: 1px; background-color: lightgrey;"></div>
                                    <a href="principal.php?option=9" aria-expanded="false" style="color: black; text-decoration: none;"> <span class="spanNumber"><?php echo numeroDeProyectos();?></span> Activos</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }?>
                            
                <div class="col-md-6">
                    <div class="view">
                        <h4 class=" flex-center subheading font-weight-bold ">Reglamento</h4>
                        <div class="mask  hm-gradient ">                      
                        </div>
                    </div>                    
                    <span style="color: dimgrey; ">
                    Lorem ipsum dolor sit amet,
                        consectetur adipiscing elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut
                        enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquid ex ea commodi
                        consequat. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                        pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt
                        mollit anim id est laborum.
                    </span>
                </div>
            </div>
        </div>   
    </div>

      
        <!-- Intro -->

        <?php
    }
    else if($option==2 && $typeUser ==1)
    {
        include "solicitudesDependientes.php";
    }
    else if($option==3 && $typeUser ==1)
    {
        include "dependientesActivos.php";
    }
    else if($option==4 && $typeUser ==5)
    {
      include "solicitudesInvestigadores.php";
    }else if($option==5 && $typeUser ==5)
    {
        include "investigadoresActivos.php";
    }
    else if($option==6 && $typeUser ==5)
    {
        include "solicitudesProfesionales.php";
    }else if($option==7 && $typeUser ==5)
    {
        include "profesionalesActivos.php";
    }
    else if($option==8 && $typeUser ==5)
    {
        include "solicitudesProyectos.php";
    }else if($option==9 && $typeUser ==5)
    {
        include "proyectosActivos.php";
    }else if ($option == 10){
            include "registrarProyecto.php";
            //include "registrarUsuario.php";
    }
    else if ($option == 11) {
        include "proyectosPropios.php";
    }else if($option == 12)
    {
        include "proyectosColaboracion.php";
    }else if($option == 13){
	include "consultaProyecto.php";
    }else if($option == 14){
	include "consultaProyectoAdmin.php";
    }
    else if($option == 15){
    include "consultaPersonal.php";}
    else if($option == 16 || $option == 17){
        include "consultaPersonal.php";}
    ?>

</div>
<?php
    require_once('common/footer.php');
?>

