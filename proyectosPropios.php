<?php
/**
 * Created by IntelliJ IDEA.
 * User: 
 * Date: 21/01/2020
 * Time: 09:24 PM
 */




    $proyectosPropios= misProyectos($email,$typeUser);


?>
<!-- Intro -->
<div class="container">

    <div class="row " >
        <div class="col-sm-12"  style="margin-top: 7em;" >
        <a href='.' class="btn btn--blue active float-right" role="button" aria-pressed="true" style="color:white">Regresar</a>
        </div>
    </div>
    

    <div class="row">

       
        <div class="col-md-12">
            <div class="view" >
                <h4 class="flex-center request font-weight-bold pl-3" style="color: darkgrey;">Mis proyectos</h4>
                <div class="mask "style="background-color: rgba(43,10,96,0.2);">
                </div>
            </div>
        </div>
    </div>
          
    <div class="row">
        <div class="col-sm-12">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Area de investigación</th>
                    <th scope="col">Resumen</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Opciones</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $contador=1;
                while ($solicitud = mysqli_fetch_assoc($proyectosPropios)) {
                    ?>
                    <tr id="<?php echo "fila".$contador;?>">
                        <th scope="row"><?php echo codifica($solicitud['ID']);?></th>
                        <td><?php echo codifica($solicitud['titulo']);?></td>
                        <td><?php echo codifica($solicitud['areaDeInvestigacion']);?></td>
                        <td><?php echo codifica($solicitud['resumen']);?></td>
                        <td><?php echo codifica($solicitud['estado'])==1?'Activo':'En revisión';?></td>
                        <td><a href="principal.php?option=13&idProyecto=<?php echo codifica($solicitud['ID']);?>"><i class="fas fa-eye mr-2 grey-text"></i></a></td>
                    </tr>
                    <?php
                    $contador++;
                }

                ?>

                </tbody>
            </table>
        </div>
    </div>


    <div class="row">                      
        <div class="col-sm-12 col-md-7">
            <!--div class="dataTables_paginate paging_simple_numbers" id="dtBasicExample_paginate">
                <ul class="pagination">
                    <li class="paginate_button page-item previous disabled" id="dtBasicExample_previous">
                        <a href="#" aria-controls="dtBasicExample" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                    </li>
                    <li class="paginate_button page-item active">
                        <a href="#" aria-controls="dtBasicExample" data-dt-idx="1" tabindex="0" class="page-link">1</a>
                    </li>
                    <li class="paginate_button page-item ">
                        <a href="#" aria-controls="dtBasicExample" data-dt-idx="2" tabindex="0" class="page-link">2</a>
                    </li>
                    <li class="paginate_button page-item ">
                        <a href="#" aria-controls="dtBasicExample" data-dt-idx="3" tabindex="0" class="page-link">3</a>
                    </li>
                    <li class="paginate_button page-item ">
                        <a href="#" aria-controls="dtBasicExample" data-dt-idx="4" tabindex="0" class="page-link">4</a>
                    </li>
                    <li class="paginate_button page-item ">
                        <a href="#" aria-controls="dtBasicExample" data-dt-idx="5" tabindex="0" class="page-link">5</a>
                    </li>
                    <li class="paginate_button page-item ">
                        <a href="#" aria-controls="dtBasicExample" data-dt-idx="6" tabindex="0" class="page-link">6</a>
                    </li>
                    <li class="paginate_button page-item next" id="dtBasicExample_next">
                        <a href="#" aria-controls="dtBasicExample" data-dt-idx="7" tabindex="0" class="page-link">Next</a>
                    </li>
                </ul>
            </div-->
        </div>
    </div>


</div>


