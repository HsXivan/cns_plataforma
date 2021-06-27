<?php

include "lib/validarSesionIndex.php";
$mensajeError = "";
$option=0;
if (isset($_GET["respuesta"])) $respuesta = $_GET["respuesta"]; else $respuesta = "";
switch ($respuesta)
{
    case "1": $respuesta = "El usuario o contrase&ntilde;a no pueden ir vac&iacute;os"; break;
    case "2": $respuesta = "No has iniciado tu sesi&oacute;n o bien ha expirado. Autentificate"; break;
    case "3": $respuesta = "El nombre de usuario o contrase&ntilde;a son incorrectos"; break;
    case "4": $respuesta = "El registro fue exitoso, espera la respuesta de la autorizaci&oacute;n"; break;
    case "5": $respuesta = "Tu registro sigue pendiente de aprobaci&oacute;n"; break;
    case "6": $respuesta = "Usuario ya registrado con ese email."; break;
    case "7": $respuesta = "Datos actualizados exitosamente"; break;
}

    if(isset($_GET["option"]))
        $option=$_GET["option"];
       
        if($option==2){
            $respuesta = "Se ha producido un error al guardar los datos, por favor intente de nuevo.";
        }

    

    require_once('common/header.php');
?>






    <div class="container" style="margin-top:30px">
    <!---mensajes-->
        <div class="row" >
            <div class="col-sm-12">   
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
            }else if ($mensajeError != ""){
                ?>
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <strong>Alert!</strong> <?php echo $mensajeError;?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
            }?>
            </div>
        </div>
        <!--fin mensajes-->

        <!-- cuerpo de inicio-->

        <?php
       
        if ($option == 0) 
        {
        ?>


        <div class="row" style="margin-top: 7em; margin-bottom: 7em;">
            <div class="col-sm-4"> 
                <div class="card">
                    <div class="card-body text-center">
                    <form action="lib/login.php" method="post">
                        <h3>Inicio de Sesión</h3>
                        <br>
                        <div class="form-group">
                            
                        <input class="form-control" type="email" name="txtEmail" id ="txtEmail" placeholder="E-mail" aria-describedby="material-addon1" required>
                        </div>
                        <div class="form-group">
                            
                        <input class="form-control" type="password" name="txtPassword" id = "txtPassword" placeholder="Password" aria-describedby="material-addon2" required>
                        </div>                       
                            <button type="submit" class="btn btn-start-sesion btn-rounded btn-start-sesion" style="background-image: linear-gradient(green, #A4E0A7) !important; color:white">Entrar</button>                          
                        </form> 
                        <br>
                        <a href="forgotten.php" class="new_account ">¿Olvidaste tu contraseña?</a>
                        <br>
                        <hr>
                        <br>
                        <a type="button" class="btn btn-lily  btn-rounded" href="index.php?option=1" style="color: white;">Crear cuenta</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-8">
                <div class="row">
                    <div class=" col-sm-12 card">
                        <div class="card-body text-center">                   
                            <div class="card bg-success text-white">
                                <div class="card-body" style="background-image: linear-gradient(green, #A4E0A7) !important;"><h3>Guías de usuario</h3></div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-4" style="padding: 20px 0 20px; 0">Guia de usuario</div>
                                <div class="col-sm-4" style="padding: 20px 0 20px; 0">Guia de usuario</div>
                                <div class="col-sm-4" style="padding: 20px 0 20px; 0">Guia de usuario</div>
                                <div class="col-sm-4" style="padding: 20px 0 20px; 0">Guia de usuario</div>
                                <div class="col-sm-4" style="padding: 20px 0 20px; 0">Guia de usuario</div>
                            </div>
                        </div>
                    </div>
                </div>
                </br>

                <!--div class="row">
                    <div class=" col-sm-12 card">
                        <div class="card-body text-center">                   
                            <div class="card bg-success text-white">
                                <div class="card-body" style="background-image: linear-gradient(green, #A4E0A7) !important;"><h3>Guías de usuario</h3></div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-4" style="padding: 20px 0 20px; 0">Guia de usuario</div>
                                <div class="col-sm-4" style="padding: 20px 0 20px; 0">Guia de usuario</div>
                                <div class="col-sm-4" style="padding: 20px 0 20px; 0">Guia de usuario</div>
                                <div class="col-sm-4" style="padding: 20px 0 20px; 0">Guia de usuario</div>
                                <div class="col-sm-4" style="padding: 20px 0 20px; 0">Guia de usuario</div>
                            </div>
                        </div>
                    </div>
                </div-->      

            </div>


            
        </div>    
       
        <div class="row">
            <div class="col-sm-12">
                <h2>Noticias de los usuarios</h2>
                <br>
                <hr>
                <p style=" color: #361170; font-weight: bold;font-size: 22px; ">Título de la Noticia</p>
                
                Publicado por Nombre Apellido Apellido el 09/09/2020 09:15hrs
                <br>
                <br>
                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam 
                nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volut-pat. 
                Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit 
                lobortis nisl ut aliquip ex ea commodo consequat
                <br>
                <br>
                Leer más...
                <br> <br>
                <hr>
                <p style=" color: #361170; font-weight: bold;font-size: 22px; ">Título de la Noticia</p>
                
                Publicado por Nombre Apellido Apellido el 09/09/2020 09:15hrs
                <br>
                <br>
                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam 
                nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volut-pat. 
                Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit 
                lobortis nisl ut aliquip ex ea commodo consequat
                <br>
                <br>
                Leer más...
                <br> <br>
                <hr>
                <p style=" color: #361170; font-weight: bold;font-size: 22px; ">Título de la Noticia</p>
                
                Publicado por Nombre Apellido Apellido el 09/09/2020 09:15hrs
                <br>
                <br>
                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam 
                nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volut-pat. 
                Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit 
                lobortis nisl ut aliquip ex ea commodo consequat
                <br>
                <br>
                Leer más...
                <br> <br>
                <hr>
            </div>
        </div>
        <?php }
         if($option==1){
            include "registrarUsuario.php";
        }
        ?>
        <!-- fin cuerpo de inicio-->



    </div>
<?php
require_once('common/footer.php');
?>