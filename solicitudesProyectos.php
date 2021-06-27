<?php
/**
 * Created by IntelliJ IDEA.
 * User: leonardo
 * Date: 21/01/2020
 * Time: 09:24 PM
 */
$solicitudesAcademicos = solicitudesAcademicosProyectos();
$solicitudesDependientes = solicitudesDependientesProyectos();
$solicitudesProfesionales = solicitudesProfesionalesProyectos();
?>
<!-- Intro -->
<div class="container">

    <div class="row " style="margin-top: 7em;">
        <div class="col-sm-12">
        <a href='.' class="btn btn--blue active float-right" role="button" aria-pressed="true" style="color:white">Regresar</a>
        </div>
    </div>
    
    <div class="row">        
        <div class="col-md-12">
            <div class="view">
                <h4 class="flex-center request font-weight-bold pl-3" style="color: darkgrey;">Solicitudes pendientes de proyectos</h4>
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
                    <th scope="col">Area de Investigación</th>
                    <th scope="col">Cuenta</th>
                    <th scope="col">Responsable</th>
                    <th scope="col">Gestor</th>
                    <th scope="col">Opciones</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $contador=1;
            while ($solicitud = mysqli_fetch_assoc($solicitudesAcademicos)) {
                    ?>
                    <tr id="<?php echo "fila".$contador;?>">
                        <th scope="row"><?php echo codifica($solicitud['ID']);?></th>
                        <td><?php echo codifica($solicitud['titulo']);?></td>
                        <td>

                        <?php
                        switch(codifica($solicitud['areaDeInvestigacion'])){
                            case 1: echo  "Físico Matemáticas y Ciencias de la Tierra"; break;
                            case 2: echo "Biología y Química"; break;
                            case 3: echo "Ciencias Médicas y de la Salud";break;
                            case 4: echo "Humanidades y Ciencias de la Conducta";break;
                            case 5: echo "Ciencias Sociales";break;
                            case 6: echo "Biotecnología y Ciencias Agropecuarias";break;
                            case 7: echo "Ingenierías";break;
                            default: echo codifica($solicitud['areaDeInvestigacion']);
                            
                        }
                        ?></td>

                        <td>Profesor-Investigador</td>
                        <td><?php echo codifica($solicitud['nombres'])." ".codifica($solicitud['apellidoPaterno'])." ".codifica($solicitud['apellidoMaterno']);?></td>
                        <td>No aplica</td>
                        <td><a href="principal.php?option=14&idProyecto=<?php echo codifica($solicitud['ID']);?>&email=<?php echo codifica($solicitud['correoDelAcademico']);?>&type=1">
                        <i class="fas fa-eye mr-2 grey-text"></i></a><a onclick="aceptarProyecto('<?php echo codifica($solicitud['proyectId']);?>' ,  '<?php echo codifica($solicitud['correoDelAcademico']);?>' , '<?php echo "fila".$contador;?>',2)">
                        <i class="fas fa-check mr-2 green-text"></i></a><a onclick="rechazarProyecto('<?php echo codifica($solicitud['proyectId']);?>' ,  '<?php echo codifica($solicitud['correoDelAcademico']);?>', '<?php echo "fila".$contador;?>', '2')"><i class="fas fa-times red-text"></i></a>
                    </td>

                    </tr>
                    <?php
                    $contador++;
                }
                while ($solicitud = mysqli_fetch_assoc($solicitudesDependientes)) {
                    ?>
                    <tr id="<?php echo "fila".$contador;?>">
                        <th scope="row"><?php echo codifica($solicitud['ID']);?></th>
                        <td><?php echo codifica($solicitud['titulo']);?></td>
                        <td><?php echo codifica($solicitud['areaDeInvestigacion']);?></td>
                        <td>Estudiante o Posdoc</td>
                        <td><?php echo codifica($solicitud['nombres'])." ".codifica($solicitud['apellidoPaterno'])." ".codifica($solicitud['apellidoMaterno']);?></td>
                        <td><?php echo codifica($solicitud['correoDelResponsable']);?></td>
                        <td>
                            <a href="principal.php?option=14&idProyecto=<?php echo codifica($solicitud['ID']);?>&email=<?php echo codifica($solicitud['correoDelGestor']);?>&type=2"><i class="fas fa-eye mr-2 grey-text"></i></a>
                            <a onclick="aceptarProyecto('<?php echo codifica($solicitud['proyectId']);?>' , '<?php echo codifica($solicitud['correoDelGestor']);?>' , '<?php echo "fila".$contador;?>',1)"><i class="fas fa-check mr-2 green-text"></i></a>
                            <a onclick="rechazarProyecto('<?php echo codifica($solicitud['proyectId']);?>' , '<?php echo codifica($solicitud['correoDelGestor']);?>' , '<?php echo "fila".$contador;?>','1')"><i class="fas fa-times red-text"></i></a>
                        </td>

                    </tr>
                    <?php
                    $contador++;
                }				
                while ($solicitud = mysqli_fetch_assoc($solicitudesProfesionales)) {
                    ?>
                    <tr id="<?php echo "fila".$contador;?>">
                        <th scope="row"><?php echo codifica($solicitud['ID']);?></th>
                        <td><?php echo codifica($solicitud['titulo']);?></td>
                        <td><?php echo codifica($solicitud['areaDeInvestigacion']);?></td>
                        <td>Profesional</td>
                        <td><?php echo codifica($solicitud['nombres'])." ".codifica($solicitud['apellidoPaterno'])." ".codifica($solicitud['apellidoMaterno']);?></td>
                        <td>No aplica</td>
                        <td><a href="principal.php?option=14&idProyecto=<?php echo codifica($solicitud['ID']);?>&email=<?php echo codifica($solicitud['correoDelProfesional']);?>&type=4">
                        <i class="fas fa-eye mr-2 grey-text"></i></a><a onclick="aceptarProyecto('<?php echo codifica($solicitud['proyectId']);?>' ,  '<?php echo codifica($solicitud['correoDelProfesional']);?>' , '<?php echo "fila".$contador;?>',3)">
                        <i class="fas fa-check mr-2 green-text"></i></a><a onclick="rechazarProyecto('<?php echo codifica($solicitud['proyectId']);?>' ,'<?php echo codifica($solicitud['correoDelProfesional']);?>' , '<?php echo "fila".$contador;?>','3')"><i class="fas fa-times red-text"></i></a>
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

    <div class="row">               
        <div class="col-sm-12">
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

<script>
    function  verProyecto() {

        alert("Ver proyecto");
    }
    function aceptarProyecto(idProyecto, correo, contador,tipoUser) {
        //bnd: 1->acetar solicitud, 2->rechazar solicitud

        if (confirm("Se aceptará el proyecto, ¿confirmar?")) {
        $.get("lib/solicitudesProyectos.php", {tipo: tipoUser, id:idProyecto, email:correo,  bnd:1, index: contador})

            
        .done(function( data ) {
            console.log(data);
            if(data != "error") {
                $(data).remove();
            }
            else
                alert("No se pudo aceptar el proyecto");

        });
        }


    }
    function rechazarProyecto(idProyecto,correo,contador,tipo) {

        if (confirm("Se ELIMINARÁ el proyecto, ¿confirmar?")) {
        $.get("lib/solicitudesProyectos.php", {id:idProyecto,email:correo, bnd:2, index:contador,tipo:tipo})
        
            
        .done(function( data ) {
            console.log(data);
            if(data != "error") {
                $(data).remove();
            }
            else
                alert("No se pudo eliminar el proyecto");

        });
        }

    }


/*
    function rechazarAlumno(correo,contador) {
        //tipo: 1->estudiantes o posdoc. 2->investigadores o profesores, 3->profesionales
        //bnd: 1->acetar solicitud, 2->rechazar solicitud
        if (confirm("¿Está seguro de ELIMINAR el registro seleccionado?")) {

            $.get("lib/solicitudes.php", {tipo: 2, email:correo, bnd:2, index:contador})//function(data){
                .done(function( data ) {
                if(data!=- "error")
                    $(data).remove();
                else
                    alert("No se pudo eliminar el registro");
            });
        }
    }*/



</script>

