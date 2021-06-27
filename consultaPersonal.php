<?php

if(isset($_GET['id'])) {
    $resultDatos=getPersonalData($_GET['id'],$_GET['tipo']);

    ?>
    <!-- Intro -->

    <div class="container">
    <section class="px-4">
    <div class="row " >
        <div class="col-sm-12"  style="margin-top: 7em;">
        <a href="javascript:history.go(-1)" class="btn btn--blue active float-right" role="button" aria-pressed="true" style="color:white">Regresar</a>
        </div>
    </div>
    
        <div class="row mb-5 ">
            <div class="col-md-1 p-0 m-0"></div>
            <div class="col-md-10 pt-5 pb-2 ">
                <div class="row mb-4">
                    <div class="col-md-9">
                        <div class="d-flex flex-column justify-content-start align-items-start ">
                            <h1 class="heading display-5 dark-grey-text" style="margin-left: 0rem;"><?php echo codifica($resultDatos['nombres'])." ".codifica($resultDatos['apellidoPaterno'])." ".codifica($resultDatos['apellidoMaterno']) ?></h1>
                        </div>
                    </div>              
                </div>


                <div class="row">
                    <div class="col-md-8">
                        <h5 class="grey-text mt-5">Datos personales</h5>
                        <div class="my-1" style="width: 180px; height: 1px; background-color: lightgrey;"></div>
                        <br>
                        <br>
                            <h3 class="dark-grey-text">Grado Académico:<?php echo codifica($resultDatos['grado']); ?></h3> <br>
                            <?php 
                             
                            echo isset($resultDatos['tipoAcademico'])?"<h3 class='dark-grey-text'>Tipo Académico:".codifica($resultDatos['tipoAcademico'])."</h3> <br>":""; 
                            ?> 
                            
                            <h3 class="dark-grey-text">Correo: <?php echo  codifica($resultDatos['correo']); ?></h3><br>
                            <h3 class="dark-grey-text">Institución: <?php echo codifica($resultDatos['institucionDeAdscripcion']).", ".codifica($resultDatos['paisDeLaInstitucion']);  ?></h3><br>
                            <h3 class="dark-grey-text">Teléfono Institucional: <?php echo codifica($resultDatos['telefonoInstitucional']); ?></h3><br>
                            <h3 class="dark-grey-text">Teléfono Personal: <?php echo codifica($resultDatos['telefonoPersonal']) ?></h3><br>                           

                            <?php                              
                             echo isset($resultDatos['tipoDependiente'])?"<h3 class='dark-grey-text'>Tipo de Dependiente: ".codifica($resultDatos['tipoDependiente'])."</h3> <br>":""; 
                             ?> 
                           
                    </div>
                    
                    <div class="col-md-4">
                        <form method="get" class="mt-4" target="_blank" action="<?php echo $resultDatos['cv'];?>">

                            <button type="submit" class="subheading p-3" style="color: white; background-color:#2b0a60;">   <i class="far fa-arrow-alt-circle-down mr-2 white-text"></i>  Curriculum Vitae</button>

                        </form>
                    </div>
                </div>

            </div>
            <div class="col-md-1 p-0"></div>
        </div>
    </section>


    </div>


        <?php
}else{
?>

<?php }?>

