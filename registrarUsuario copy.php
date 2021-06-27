<?php
/**
 * Created by IntelliJ IDEA.
 * User: leonardo
 * Date: 20/01/2020
 * Time: 02:18 PM
 * modif: FCorral
 */

include ("lib/FunGen.php");

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
                <form id="formRegistro" method="POST" action="lib/newUser.php">
                    <div class="form-row m-b-55">
                        <div class="name">Nombre(s)<span style="color: red;">*</span></div>
                        <div class="value">
                            <div class="row row-space">
                                <div class="col-12">
                                    <div class="input-group-desc">
                                        <input class="input--style-5" type="text" name="txtNombres" required placeholder="Ej. José" data-toggle="tooltip" data-placement="top" title="Introduzca su nombre" >
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
                                        <input class="input--style-5" type="text" name="txtApellidoP" required placeholder="Ej. Martínez" data-toggle="tooltip" data-placement="top" title="Introduzca su apellido paterno">
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
                                        <input class="input--style-5" type="text" name="txtApellidoM" placeholder="Ej. Maldonado" data-toggle="tooltip" data-placement="top" title="Introduzca su apellido materno">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">Correo Institucional <span style="color: red;">*</span></div>
                        <div class="value">
                            <div class="input-group">
                                <input class="input--style-5" type="email" name="txtEmail" required placeholder="Ej. nombre@dominio.ext" data-toggle="tooltip" data-placement="top" title="Introduzca su correo electrónico en el formato especificado">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">Teléfono Institucional <span style="color: red;">*</span></div>
                        <div class="value">
                            <div class="input-group">
                                <input class="input--style-5" type="text" name="txtTelInst" required placeholder="Ej. 123-44-55" data-toggle="tooltip" data-placement="top" title="Introduzca su numero telefónico"> 
                            </div>
                        </div>
                    </div>

              


                    <div class="form-row">
                        <div class="name">Teléfono Personal</div>
                        <div class="value">
                            <div class="input-group">
                                <input class="input--style-5" type="text" name="txtTelPer" placeholder="Ej. 123-44-55" data-toggle="tooltip" data-placement="top" title="Introduzca su numero telefónico personal" >
                            </div>
                        </div>
                    </div>

                    <div  style="width: 100%; height: 1px; background-color: lightgrey;"></div>
                    <div class="form-row  mt-5">
                        <div class="name">Tipo de usuario <span style="color: red;">*</span></div>
                        <div class="value">
                            <div class="input-group">
                                <div class="rs-select2 js-select-simple select--no-search">
                                    <select name="txtTypeUser" id="txtTypeUser" onchange="opcionTutor()" required>
                                    <!--select name="txtTypeUser" id="txtTypeUser" onchange="pideURL(this)" required-->
                                        <option disabled selected="selected">Seleccione una opción</option>
                                        <option value="1">Profesor-Investigador</option>
                                        <option value="2">Estudiante</option>
                                        <option value="3">Posdoc</option>
                                        <option value="4">Empresa</option>
                                    </select>
                                    <div class="select-dropdown"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <div class="form-row url-empresa" style="display: none">
                        <div class="name">Sitio URL de la empresa:<span style="color: red;">*</span></div>
                        <div class="value">
                            <div class="input-group">
                                <input class="input--style-5" type="text" name="urlEmpresa" required placeholder="www.ejemplo.com" data-toggle="tooltip" data-placement="top" title="URL de la empresa" required>
                            </div>
                        </div>
                    </div>



                    <div class="form-row ">

                            <div class="name">Grado Académico <span style="color: red;">*</span></div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="txtGrado" required>
                                            <option value="" disabled="disabled" selected="selected">Seleccione una opción</option>
                                            <option value="1">Licenciatura</option>
                                            <option value="2">Maestria</option>
                                            <option value="3">Doctorado</option>
					    <option value="4">Otro</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>

                    </div>

                    <div class="form-row">

                        <div class="name">Pais de la institución <span style="color: red;">*</span></div>
                        <div class="value">
                            <div class="input-group">
                                <div class="rs-select2 js-select-simple select--no-search">
                                    <select name="txtPais" required>
                                        <option value="" disabled="disabled" selected="selected">Escoge una opción</option>

                                        <?php


                                        while ($pais = mysqli_fetch_assoc($listPaises)) {
                                            ?>
                                            <option value='<?php echo codifica($pais['ID']);?>'><?php echo codifica($pais['nombre']);?></option>
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
                                <input class="input--style-5" type="text" name="txtInstitucion" required>
                            </div>
                        </div>
                    </div>




                        <div class="form-row">
                            <div class="name">Contraseña <span style="color: red;">*</span></div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="password" name="txtPassword" required data-toggle="tooltip" data-placement="top" title="minusculas, mayusculas numero y caracter especial" >
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


                    <div class="form-row">
                        <div class="name">Curriculum Vitae (PDF 2MB max)</div>
                        <div class="value">
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="cvu" name="cvu">
                                    <label class="custom-file-label" for="resumen">Seleccione el archivo</label>
                                </div>
                            </div>
                        </div>                        
                    </div>



                    <div class="form-row">                      
                        <div class="value">
                            <div class="input-group">
                            <button class="btn btn--radius-2 btn--red" style="color: #fff;" type="submit">Registrar</button>                               
                            </div>
                        </div>
                    </div>



                   

                    
                       

                </form>
			<p class="mt-3"><span style="color:red;">*</span> Campos abligatorios</p>
            </div>
        </div>
    </div>
</div>

</div>

<!-- Jquery JS-->
<script src="vendor/jquery/jquery.min.js"></script>
<!-- Vendor JS-->
<script src="vendor/select2/select2.min.js"></script>
<script src="vendor/datepicker/moment.min.js"></script>
<script src="vendor/datepicker/daterangepicker.js"></script>

<!-- Main JS-->
<script src="js/global.js"></script>

<script>
   /* function opcionTutor() {

        if(document.getElementById("txtTypeUser").value==1||document.getElementById("txtTypeUser").value==4)
        {
            var formTutor = document.getElementById("formTutor");
            formTutor.style.display= "none";
            formTutor.value= "";
        }else if(document.getElementById("txtTypeUser").value==2||document.getElementById("txtTypeUser").value==3){
            document.getElementById("formTutor").style.display= "flex";
        }

    }*/


    function pideURL(tipo) {
     

       if (tipo.value == 4) {         

           $(".url-empresa").css("display", "flex");
           
       } else {
           //console.log("hide justificación")
           $(".url-empresa").css("display", "none");
       }
   }


</script>


