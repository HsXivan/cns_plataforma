<?php
include_once ("lib/FunGen.php");
$editar=0;
//echo $_GET['idUsr'];
if(isset($nombre) && isset($_GET['idUsr']) && $usuario=buscaUser($_GET['idUsr'])){
    print_r($usuario);
    $editar=1;
   
}

$academicosActivos = obtenerAcademicosEmailNombre();
$listPaises = obtenerPaises();
?>


<div class="container">
<div class="page-wrapper bg-gra-03 p-t-45 p-b-50 mt-5">
    <div class="wrapper wrapper--w790">
        <div class="row">
            <div class="col-sm-12">
            <a href='.' class="btn btn--blue active float-right" role="button" aria-pressed="true" style="color:white">Regresar</a>
            </div>
        </div>

        <div class="card card-5">
            <div class="card-heading">
                <h2 class="title-user">Registro de Usuarios</h2>
            </div>
            <div class="card-body">
                <form id="formRegistro" method="POST" action="lib/newUser.php" enctype="multipart/form-data">
                    <div class="form-row m-b-55">
                        <div class="name">Nombre(s)<span style="color: red;">*</span></div>
                        <div class="value">
                            <div class="row row-space">
                                <div class="col-12">
                                    <div class="input-group-desc">
                                        <input class="input--style-5" type="text" name="txtNombres" required placeholder="Ej. José" data-toggle="tooltip" data-placement="top" title="Introduzca su nombre"  <?php echo isset($usuario['nombres'])?"value=".$usuario['nombres']:''; ?>>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row m-b-55">
                        <div class="name p-1">Apellido Paterno <span style="color: red;">*</span></div>
                        <div class="value">
                            <div class="row row-space">
                                <div class="col-12">
                                    <div class="input-group-desc">
                                        <input class="input--style-5" type="text" name="txtApellidoP" required placeholder="Ej. Martínez" data-toggle="tooltip" data-placement="top" title="Introduzca su apellido paterno" <?php echo isset($usuario['apellidoPaterno'])?"value=".$usuario['apellidoPaterno']:''; ?>>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row m-b-55">
                        <div class="name">Apellido Materno</div>
                        <div class="value">
                            <div class="row row-space">
                                <div class="col-12">
                                    <div class="input-group-desc">
                                        <input class="input--style-5" type="text" name="txtApellidoM" placeholder="Ej. Maldonado" data-toggle="tooltip" data-placement="top" title="Introduzca su apellido materno" <?php echo isset($usuario['apellidoMaterno'])?"value=".$usuario['apellidoMaterno']:''; ?>>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">Correo Institucional <span style="color: red;">*</span></div>
                        <div class="value">
                            <div class="input-group">
                                <input class="input--style-5" type="email" name="txtEmail" required placeholder="Ej. nombre@dominio.ext" data-toggle="tooltip" data-placement="top" title="Introduzca su correo electrónico en el formato especificado" <?php echo isset($usuario['correo'])?"value=".$usuario['correo']:''; ?>>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">Teléfono Institucional <span style="color: red;">*</span></div>
                        <div class="value">
                            <div class="input-group">
                                <input class="input--style-5" type="text" name="txtTelInst" required placeholder="Ej. 123-44-55" data-toggle="tooltip" data-placement="top" title="Introduzca su numero telefónico" <?php echo isset($usuario['telefonoInstitucional'])?"value=".$usuario['telefonoInstitucional']:''; ?>> 
                            </div>
                        </div>
                    </div>

              


                    <div class="form-row">
                        <div class="name">Teléfono Personal</div>
                        <div class="value">
                            <div class="input-group">
                                <input class="input--style-5" type="text" name="txtTelPer" placeholder="Ej. 123-44-55" data-toggle="tooltip" data-placement="top" title="Introduzca su numero telefónico personal"  <?php echo isset($usuario['telefonoPersonal'])?"value=".$usuario['telefonoPersonal']:''; ?>>
                            </div>
                        </div>
                    </div>

                    <div  style="width: 100%; height: 1px; background-color: lightgrey;"></div>
                    <div class="form-row  mt-5">
                        <div class="name">Tipo de usuario<span style="color: red;">*</span></div>
                        <div class="value">
                            <div class="input-group">
                                <div class="rs-select2 js-select-simple select--no-search">
                                    <select name="txtTypeUser" id="txtTypeUser" onchange="showOption()" required>
                                        <option disabled <?php echo !isset($usuario['tipo'])?"selected='selected'":"" ?> >Seleccione una opción</option>
                                        <option value="1" <?php echo isset($usuario['tipo'])&&$usuario['tipo']==1 ?"selected='selected'":"" ?>>Profesor-Investigador</option>
                                        <option value="2" <?php echo isset($usuario['tipo'])&&$usuario['tipo']==2 ?"selected='selected'":"" ?> >Estudiante</option>
                                        <option value="3" <?php echo isset($usuario['tipo'])&&$usuario['tipo']==3 ?"selected='selected'":"" ?>>Posdoc</option>
                                        <option value="4" <?php echo isset($usuario['tipo'])&&$usuario['tipo']==4 ?"selected='selected'":"" ?>>Empresa</option>
                                    </select>
                                    <div class="select-dropdown"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class='form-row' id='formTutor' style="display: none;">
                        <div class='name'>Tutor</div>

                        <div class='value'>
                            <div class='input-group'>
                                <div class='rs-select2 js-select-simple select--no-search'>
                                    <select name='txtEmailTutor'>
                                        <option  value=""  selected='selected'>Escoge una opción</option>
                                        <?php
                                        while ($academico = mysqli_fetch_assoc($academicosActivos)) {
                                        ?>
                                            <option value='<?php echo codifica($academico['correo']);?>'><?php echo codifica($academico['nombres']).' '.codifica($academico['apellidoPaterno']).' '.codifica($academico['apellidoMaterno']);?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <div class='select-dropdown'></div>
                                </div>
                            </div>
                        </div>
                    </div>





                    <div class="form-row" id="url-empresa" style="display: none;" >
                        <div class="name">Sitio URL de la empresa:<span style="color: red;">*</span></div>
                        <div class="value">
                            <div class="input-group">
                                <input class="input--style-5" type="text" name="urlEmpresa" placeholder="www.ejemplo.com" data-toggle="tooltip" data-placement="top" title="URL de la empresa"   >
                            </div>
                        </div>
                    </div>


                    <div class="form-row ">
                        <div class="name">Grado Académico <span style="color: red;">*</span></div>
                        <div class="value">
                            <div class="input-group">
                                <div class="rs-select2 js-select-simple select--no-search">
                                    <select name="txtGrado" required>
                                        <option value="" disabled="disabled" <?php echo !isset($usuario['gradoAcademico'])?"selected='selected'":"" ?>>Seleccione una opción</option>
                                        <option value="1" <?php echo isset($usuario['gradoAcademico'])&&$usuario['gradoAcademico']==1 ?"selected='selected'":"" ?>>Licenciatura</option>
                                        <option value="2" <?php echo isset($usuario['gradoAcademico'])&&$usuario['gradoAcademico']==2?"selected='selected'":"" ?>>Maestria</option>
                                        <option value="3" <?php echo isset($usuario['gradoAcademico'])&&$usuario['gradoAcademico']==3 ?"selected='selected'":"" ?>>Doctorado</option>
                                        <option value="4" <?php echo isset($usuario['gradoAcademico'])&&$usuario['gradoAcademico']==4 ?"selected='selected'":"" ?>>Otro</option>
                                    </select>
                                    <div class="select-dropdown"></div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="form-row">
                        <div class="name">País de la institución <span style="color: red;">*</span></div>
                        <div class="value">
                            <div class="input-group">
                                <div class="rs-select2 js-select-simple select--no-search">
                                    <select name="txtPais" required>
                                        <option value="" disabled="disabled" selected="selected">Escoge una opción</option>

                                        <?php


                                        while ($pais = mysqli_fetch_assoc($listPaises)) {
                                            ?>
                                            <option value=<?php echo "'".codifica($pais['ID'])."'"; 
                                            echo isset($usuario['paisDeLaInstitucion'])&&$usuario['paisDeLaInstitucion']==$pais['ID']?"selected='selected'":"" ?> >
                                                <?php echo codifica($pais['nombre']); ?>
                                            </option>
                                            <?php
                                        }

                                        ?>
                                    </select>
                                    <div class="select-dropdown"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="name">Institución de adscripción <span style="color: red;">*</span></div>
                        <div class="value">
                            <div class="input-group">
                                <input class="input--style-5" type="text" name="txtInstitucion" required <?php echo isset($usuario['institucionDeAdscripcion'])?"value=".$usuario['institucionDeAdscripcion']:''; ?>>
                            </div>
                        </div>
                    </div>




                        <div class="form-row">
                            <div class="name">Contraseña<span style="color: red;">*</span></div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="password" name="txtPassword" <?php if(!$editar){?>required<?php }?> data-toggle="tooltip" data-placement="top" title="Minúsculas, mayúsculas, número y caracter especial" >
                                </div>
                            </div>
                        </div>
                   

                    <div class="form-row">
                        <div class="name">Curriculum Vitae (PDF 2MB max)<span style="color: red;">*</span></div>
                        <div class="value">
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="cvu" name="cvu" <?php if(!$editar){?>required<?php }?> data-toggle="tooltip" data-placement="top" title="Anexe su CV, maximo 2MB">
                                    <label class="custom-file-label" for="cvu">Seleccione el archivo</label>
                                </div>                               
                            </div>
                        </div>        
                        <p id="output"></p>                 
                    </div>
                    <?php if($editar)
                    {?> 
                    <input type="hidden" value="1" id="editaUsuario" name="editaUsuario">
                    <span style="font-style: italic;">Al subir un nuevo CV se borrará el anterior</span>
                        <div class="form-row">
                            <a href="/<?php echo isset($usuario['cv'])?$usuario['cv']:''; ?>">Ver curriculum Actual</a>
                        </div>
                        <?php
                    }
                    ?>

                
                    <!-- Capcha -->
                    <div class="form-row">
                        <div class="col-sm-5"><img src="common/democapcha.php" alt="CAPTCHA" class="captcha-image"><i class="fas fa-redo refresh-captcha"></i>
                        
                        
                        </div>
                        <div class="col-sm-3">
                            <div class="input-group">
                            <input class="input--style-5" type="text" id="captcha" name="captcha_challenge" pattern="[A-Z]{6}" required >                            
                           
                            <p id="output"></p>                 
                            </div>
                        </div>
                                                        
                        <div class="col-sm-1">
                        <i id="notificationOK" style="display: none;" class="fas fa-check green-text"></i>
                        </div>
                        
                        <div class="col-sm-2">
                        
                            <input type="button" value="validar" id="send" name="send" class="derp btn btn--radius-1 btn--blue" >
                        </div>

                        

                        <div id="notification" style="display: none;">
                        </div>                       
                        
                    </div>
                    

                    



                    <div class="form-row">
                      
                        <div class="value">
                            <div class="input-group">
                            <button class="registrar btn btn--radius-2 btn--red" style="color: #fff;" type="submit" disabled>Registrar</button>                               
                            </div>
                        </div>
                    </div>

                       

                </form>
			<p class="mt-3"><span style="color:red;">*</span> Campos obligatorios</p>
            </div>
        </div>
    </div>
</div>

</div>

<!-- Jquery JS-->

<script type="text/javascript" src="js/jquery.min.js"></script>
<script>


    function showOption() {

        if(document.getElementById("txtTypeUser").value==1)
        {
            var formTutor = document.getElementById("formTutor");
            formTutor.style.display= "none";
            formTutor.value= "";
        }else if(document.getElementById("txtTypeUser").value==2||document.getElementById("txtTypeUser").value==3){
            document.getElementById("formTutor").style.display= "flex";
        }
        else if(document.getElementById("txtTypeUser").value==4){
            console.log('derp');
            document.getElementById("url-empresa").style.display= "flex";
        }

    }


$('#cvu').on('change', function() { 
    myfile= $( this ).val();
    var ext = myfile.split('.').pop();
    if(ext!="pdf"){
        alert("Solo se permiten Archivos PDF"); 
      $('#cvu').val('');
    }
    
    else {
        const size = (this.files[0].size / 1024 / 1024).toFixed(2); 
        if (size > 2 || size < 0) { 
            alert("Tamaño maximo permitido es de 2MB"); 
            $('#cvu').val('');
        } else { 
            $("#output").html('' + 
                'Tamaño del Archivo: ' + size + " MB" + ''); 
        } 
    }
}); 



var refreshButton = document.querySelector(".refresh-captcha");
refreshButton.onclick = function() {
  document.querySelector(".captcha-image").src = 'common/democapcha.php?' + Date.now();
}

$(document).ready(function() {
  $('.derp').click(myFunction);

});

function myFunction() {
    //$("#notification").remove();
    //console.log("hello!");
    $.ajax({
        type: "POST",
        url: 'common/verify.php',
        data: {
                captcha: $("#captcha").val()
            },
        dataType: "html",
        success: function(data) {
            // Run the code here that needs
            //    to access the data returned
            //alert(data);
           if(data === "true")
           {
            $("#captcha").prop( "disabled", true );
            $("#notificationOK").css("display", "block");         
            $(".registrar").prop('disabled', false); 
                
           }
            
            else //alert("Capcha incorrecto");
            {
                $('#notification_msg').remove();
                $('#notification').fadeIn("slow").append("<p id='notification_msg' style='color:red'>Capcha Incorrecto</p>");    
                //$("#notification").fadeIn("slow").append('Capcha Incorrecto ');                
                $("#notification").fadeOut(2500);
               // 
            }
            return data;
        },
        error: function() {
            alert('Error occured');
        }
    });
}

</script>


