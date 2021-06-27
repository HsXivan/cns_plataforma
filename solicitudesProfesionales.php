<?php
/**
 * Created by IntelliJ IDEA.
 * User: leonardo
 * Date: 21/01/2020
 * Time: 09:24 PM
 */
$solicitudesPendientes = solicitudesDeProfesionales();
?>
<!-- Intro -->

<div class="container">


    <div class="row " style="margin-top: 7em;">
        <div class="col-sm-12">
        <a href='.' class="btn btn--blue active float-right" role="button" aria-pressed="true" style="color:white">Regresar</a>
        </div>
    </div>
    
    <div class="row">        
        <div class="col-lg-12">

            <div class="view">
                <h4 class="flex-center request font-weight-bold pl-3" style="color: darkgrey;">Solicitudes pendientes de Profesionales</h4>

                <div class="mask "style="background-color: rgba(43,10,96,0.2);">

                </div>
            </div>           
            <div id="dtBasicExample_wrapper" class="dataTables_wrapper dt-bootstrap4">             
        
            <div class="col-sm-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Nombre(s)</th>
                        <th scope="col">Apellido(s)</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Institución</th>
                        <th scope="col">Grado Académico</th>
                        <th scope="col">Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $contador=1;
                    while ($solicitud = mysqli_fetch_assoc($solicitudesPendientes)) {
                        ?>
                        <tr id="<?php echo "fila".$contador;?>">
                            <th scope="row"><?php echo codifica($solicitud['nombres']);?></th>
                            <td><?php echo codifica($solicitud['apellidoPaterno'])." ". codifica($solicitud['apellidoMaterno']);?></td>
                            <td><?php echo codifica($solicitud['correo']);?></td>
                            <td><?php echo codifica($solicitud['institucionDeAdscripcion']);?></td>
                            <td><?php echo codifica($solicitud['grado']);?></td>
                            <td>
                                <a onclick="aceptarAlumno('<?php echo codifica($solicitud['correo']);?>' , '<?php echo "fila".$contador;?>')"><i class="fas fa-check mr-2 green-text"></i></a>
                                <a onclick="rechazarAlumno('<?php echo codifica($solicitud['correo']);?>' , '<?php echo "fila".$contador;?>')"><i class="fas fa-times red-text"></i></a>
                                <a class="mr-2"  href="principal.php?option=15&id=<?php echo codifica($solicitud['correo']);?>&tipo=4" ><i class="fas fa-eye grey-text"></i></a>
                            
                            </td>
                        </tr>
                        <?php
                        $contador++;
                    }
                    ?>

                    </tbody>
                </table>
            </div>
            </div>
        </div>
            <div class="row">
                    <!--
                    <div class="col-sm-12 col-md-5">
                        <div class="dataTables_info" id="dtBasicExample_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
                    </div>
                    -->
                    <div class="col-sm-12 col-md-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="dtBasicExample_paginate">
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
                        </div>
                    </div>
                </div>
            </div>

            
        </div>
       
    </div>
                        </div>

<script>
    function aceptarAlumno(correo, contador) {
        //tipo: 1->estudiantes o posdoc. 2->investigadores o profesores, 3->profesionales
        //bnd: 1->acetar solicitud, 2->rechazar solicitud
        $.get("lib/solicitudes.php", {tipo: 3, email:correo, bnd:1, index: contador},function(data){

            if(data != "error") {
                console.log(data);
                $(data).remove();
            }
            else
                alert("No se pudo eliminar el foro");

        });

    }
    function rechazarAlumno(correo,contador) {
        //tipo: 1->estudiantes o posdoc. 2->investigadores o profesores, 3->profesionales
        //bnd: 1->acetar solicitud, 2->rechazar solicitud
        $.get("lib/solicitudes.php", {tipo: 3, email:correo, bnd:2, index:contador},function(data){
            if(data!=- "error")
            
                $(data).remove();
            else
                alert("No se pudo eliminar el registro");
        });
    }
</script>

