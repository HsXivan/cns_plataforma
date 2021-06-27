<?php
/**
 * Created by IntelliJ IDEA.
 * User: leonardo
 * Date: 28/01/2020
 * Time: 12:22 PM
 */
if(isset($_GET['idProyecto'])) {
    $resultJson = consultarProyecto($email, $_GET['idProyecto'], $typeUser);
    $resultSoftwareJson = consultarSoftwareRequerido($resultJson[0]->idDetalle);
    ?>
    <!-- Intro -->


    <div class="container">
    <div class="row" >
        <div class="col-sm-12"  style="margin-top: 7em;">
        <a href="javascript:history.go(-1)" class="btn btn--blue active float-right" role="button" aria-pressed="true" style="color:white">Regresar</a>
        </div>
    </div>


    <div class="row">
        <div class="col-md-9">
            <div class="d-flex flex-column justify-content-start align-items-start ">
                <h1 class="heading display-5 dark-grey-text" style="margin-left: 0rem;"><?php echo $resultJson[0]->titulo; ?></h1>
            </div>
        </div>
        <div class="col-md-3 grey-text" ><h5>Estado</h5> <strong class="dark-grey-text h3-responsive"><?php if($resultJson[0]->estado==0) echo "En revisión"; else echo "Aceptado";?></strong></div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h5 class="grey-text">Resumen</h5>
                <div class="my-1" style="width: 90px; height: 1px; background-color: lightgrey;"></div>
            <h3 class="dark-grey-text"><?php echo $resultJson[0]->resumen; ?></h3>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-8">
            <h5 class="grey-text mt-3">Justificación del Proyecto</h5>
            <div class="my-1" style="width: 180px; height: 1px; background-color: lightgrey;"></div>
            <h3 class="dark-grey-text"><?php echo $resultJson[0]->justificacion; ?></h3>
        </div>
        <div class="col-md-4">
            <form method="get" class="mt-3" target="_blank" action="<?php echo $resultJson[0]->fileJustificacion;?>">
                <button type="submit" class="p-3" style="color: white; background-color:#2b0a60;">   <i class="far fa-arrow-alt-circle-down mr-2 white-text"></i>Descargar justificación</button>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <h5 class="grey-text mt-3">Financiamiento</h5>
            <div class="my-1" style="width: 90px; height: 1px; background-color: lightgrey;"></div>
            <h3 class="dark-grey-text">
                
            <?php //echo $resultJson[0]->financiamiento; 
            
            
            switch($resultJson[0]->financiamiento){
                case 1: echo  "Recursos propios"; break;
                case 2: echo "Internacional"; break;
                case 3: echo "Fondos CONACYT";break;
                case 4: echo "Industria";break;
                case 5: echo "Sin Financiamiento";break;                
                default: echo $resultJson[0]->financiamiento; break;
                
            }

            ?>
        
        
           

        </h3>
        </div>
        <div class="col-md-4">
            <h5 class="grey-text mt-3">Aréa de Investigación</h5>
            <div class="my-1" style="width: 150px; height: 1px; background-color: lightgrey;"></div>
            <h3 class="dark-grey-text"><?php 
            
            switch($resultJson[0]->areaInvestigacion){
                case 1: echo  "Físico Matemáticas y Ciencias de la Tierra"; break;
                case 2: echo "Biología y Química"; break;
                case 3: echo "Ciencias Médicas y de la Salud";break;
                case 4: echo "Humanidades y Ciencias de la Conducta";break;
                case 5: echo "Ciencias Sociales";break;
                case 6: echo "Biotecnología y Ciencias Agropecuarias";break;
                case 7: echo "Ingenierías";break;
                default: echo $resultJson[0]->areaInvestigacion; break;
                
            }

            
            
            //echo $resultJson[0]->areaInvestigacion; ?>
            </h3>
        </div>

        <div class="col-md-4">
            <h5 class="grey-text mt-3">Especialidad</h5>
            <div class="my-1" style="width: 90px; height: 1px; background-color: lightgrey;"></div>
            <h3 class="dark-grey-text"><?php echo $resultJson[0]->especialidad; ?></h3>
        </div>
    </div>



    <div class="row">
        <div class="my-4" style="width: 100%; height: 1px; background-color: lightgrey;"></div>
        <h3 class="heading " style="margin-left: 0rem; width: 100%;">Recursos solicitados</h3>

        <div class="col-md-4">
            <h5 class="grey-text mt-3">Almacenamiento</h5>
            <div class="my-1" style="width: 90px; height: 1px; background-color: lightgrey;"></div>
            <h3 class="dark-grey-text"><?php echo $resultJson[0]->almacenamiento; ?> GB</h3>
        </div>
        <div class="col-md-4">
            <h5 class="grey-text mt-3">Cores</h5>
            <div class="my-1" style="width: 90px; height: 1px; background-color: lightgrey;"></div>
            <h3 class="dark-grey-text"><?php echo $resultJson[0]->numCores; ?> Cores</h3>
        </div>
        <div class="col-md-4">
            <h5 class="grey-text mt-3">Tarjetas gráficas</h5>
            <div class="my-1" style="width: 160px; height: 1px; background-color: lightgrey;"></div>
            <h3 class="dark-grey-text"><?php echo $resultJson[0]->numTarjetasGraficas; ?> Tarjetas gráficas</h3>
        </div>
        <div class="col-md-12">
            <h5 class="grey-text mt-3">Justificación para tarjetas gráficas</h5>
            <div class="my-1" style="width: 240px; height: 1px; background-color: lightgrey;"></div>
            <h3 class="dark-grey-text"><?php echo $resultJson[0]->justificacionTarjeta; ?> </h3>
        </div>
    </div>



    <div class="row">
        <div class="my-4" style="width: 100%; height: 1px; background-color: lightgrey;"></div>
        <h3 class="heading " style="margin-left: 0rem;">Software requerido</h3>
        <div class="col-md-12">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Versión</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Enlaces</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                    for($i=0;$i < sizeof($resultSoftwareJson);$i++)
                    {  ?>
                        <tr>
                            <th scope="row"><?php echo $resultSoftwareJson[$i]->nombre;?></th>
                                                        <th><?php echo $resultSoftwareJson[$i]->version;?></td>
                            <th><?php echo $resultSoftwareJson[$i]->tipo;?></th>
                            <th><a href="<?php echo $resultSoftwareJson[$i]->sitioWeb;?>" target="_blank"> 
                                <i class="fas fa-globe mr-2 grey-text"></i>
                                </a>
                                
 				<?php if($resultSoftwareJson[$i]->pathFileLicencia!='N/A'){?>
                                <a href="<?php echo $resultSoftwareJson[$i]->pathFileLicencia;?>" target="_blank"> 
                                                                <i class="fas fa-download mr-2 grey-text"></i>
                                                            </a>
                                <?php } ?>

                            </th>
                        </tr>
                <?php	}
                ?>
            </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="my-4" style="width: 100%; height: 1px; background-color: lightgrey;"></div>
        <h3 class="heading " style="margin-left: 0rem; width: 100%;">Resultados esperados</h3>
        <div class="col-sm-12">
            <h3 class="dark-grey-text"><?php echo $resultJson[0]->resultEsperados; ?> </h3>
        </div>       
    </div>

    <div class="row" style="padding-bottom: 250px;;">
        <div class="col-sm-12 mt-3">
    
    </div>

</div>




    <?php
}else{
?>
<section class="view">

    <div class="row" style="margin-top: 7em;">

        <div class="col-md-1"></div>
        <div class="col-md-10 p-5">

            <div class="d-flex flex-column justify-content-center align-items-center h-100">
                <h1 class="heading display-4">No se recibio la información necesaria</h1>
            </div>
            <section>
            </section>
        </div>
    </div>
</section>
<?php }?>

