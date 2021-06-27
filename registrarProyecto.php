<div class="container">
    <div id="contenedor-registro" class="page-wrapper bg-gra-03 p-t-45 p-b-50" style="margin-top:40px;">
        <div class="wrapper wrapper--w790">

            <div class="row" >
                <div class="col-sm-12">
                    <a href='.' class="btn btn--blue active float-right" role="button" aria-pressed="true" style="color:white">Regresar</a>
                </div>
            </div>
        
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title-user">Registro de Proyecto</h2>                
                </div>                

                <div class="card-body">
                    <form action="registrarNuevoProyecto.php" method="post" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="name">Título (200 caracteres sin espacios)<span style="color: red;">*</span></div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5 verifica200" type="text" name="proyecto-titulo"  data-toggle="tooltip" data-placement="top" title="Introduzca el Título del proyecto" required id="proyecto-titulo" > 
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Descripción del proyecto (700 caracteres sin espacios)<span style="color: red;">*</span></div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea  class="input--style-5 verifica700" name="proyecto-descripcion" rows="4"  data-toggle="tooltip" data-placement="top" title="Describa el proyecto" required style="width: 100%;"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="card-heading2">
                            <h2 class="title2">Recursos que solicita</h2>
                        </div>
                        <div class="cuadrado">
                            <br>
                            
                                    <div class="form-row">
                                        <div class="name">Número de núcleos<span style="color: red;">*</span></div>
                                        <div class="value">
                                            <div class="input-group">
                                                <input class="input--style-5" type="number" placeholder="192" name="proyecto-cores" value="192" data-toggle="tooltip" data-placement="top" title="Número de cores requeridos en el proyecto" required >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="name">Espacio en Disco Duro (en Gigabytes)<span style="color: red;">*</span></div>
                                        <div class="value">
                                            <div class="input-group">
                                                <input class="input--style-5" type="number" name="proyecto-discoduro" value='10' data-toggle="tooltip" data-placement="top" title="Espacio en GB requerido  de HDD" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="name">Nodos de procesamiento gráfico<span style="color: red;">*</span></div>
                                        <div class="value">
                                            <div class="input-group">
                                                <div class="rs-select2 js-select-simple select--no-search">
                                                    <select name="proyecto-gpus" onchange="validarGPUs(this)" data-toggle="tooltip" data-placement="top" title="GPUs requeridos" required>
                                                        <option selected="selected" value="0">No es necesario</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                    </select>
                                                    <div class="select-dropdown"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row" style="display: none">
                                        <div class="name">Justificación del uso de GPU (700 caracteres sin espacios)<span style="color: red;">*</span></div>
                                        <div class="value">
                                            <div class="input-group">
                                                <textarea  class="proyecto-justificacion-gpu input--style-5 verifica700" name="proyecto-justificacion-gpu" rows="4" data-toggle="tooltip" data-placement="top" title="Describa la justificacion del uso del GPU"  style="width: 100%;" ></textarea>
                                            </div>
                                        </div>
                                    </div>                                
                        </div>
                        <br>

                        <div class="form-row">
                            <div class="name">Justificación del proyecto (700 caracteres sin espacios)<span style="color: red;">*</span></div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea  class="input--style-5 verifica700" name="proyecto-justificacion-gral " rows="4" data-toggle="tooltip" data-placement="top" title="Justificacion del proyecto" required style="width: 100%;"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-row">
                                <div class="name">Financiamiento<span style="color: red;">*</span></div>
                                <div class="value">
                                    <div class="input-group">
                                        <div class="rs-select2 js-select-simple select--no-search">
                                            <select name="proyecto-financiamiento" required>
                                                <option disabled="disabled" selected="selected" value="0">Escoge una opción</option>
                                                <option value="1">Recursos propios</option>
                                                <option value="2">Internacional</option>
                                                <option value="3">Fondos CONACYT</option>
                                                <option value="4">Industria</option>
                                                <option value="5">Sin Financiamiento</option>
                                            </select>
                                            <div class="select-dropdown"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-row">
                                <div class="name">Área de investigación<span style="color: red;">*</span></div>
                                <div class="value">
                                    <div class="input-group">
                                        <div class="rs-select2 js-select-simple select--no-search">
                                            <select name="proyecto-area" required>
                                                <option disabled="disabled" selected="selected">Escoge una opción</option>
                                                <option value="1">1: Físico Matemáticas y Ciencias de la Tierra</option>
                                                <option value="2">2: Biología y Química</option>
                                                <option value="3">3: Ciencias Médicas y de la Salud</option>
                                                <option value="4">4: Humanidades y Ciencias de la Conducta</option>
                                                <option value="5">5: Ciencias Sociales</option>
                                                <option value="6">6: Biotecnología y Ciencias Agropecuarias</option>
                                                <option value="7">7: Ingenierías</option>
                                            </select>
                                            <div class="select-dropdown"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Especialidad<span style="color: red;">*</span></div>
                            <div class="value">
                                <div class="input-group">
                                    <input  class="input--style-5 verifica200" type="text" name="proyecto-especialidad" required>
                                </div>
                            </div>
                        </div>
                        <div class="card-heading2">
                            <h2 class="title2">Software</h2>
                            <!--input type="hidden" name="proyecto-software" /-->
                        </div>
                        <div class="cuadrado" >
                            <div id="dynafields">
                                <!--button onclick="agregarSoftware(this); event.preventDefault();" id="boton-agregar-software" class="btn btn--radius-2 btn--blue" style="color: #fff;" >agregar software</button-->                                
                            </div>                            
                            <div class="form-row">
                            <button type="button" name="add" id="add" class="btn btn-success">Agregar Software</button>
                            </div>
                        </div>
                        
                        <br>
                     
                        <div class="form-row">
                            <div class="form-row">
                                <div class="name">Colaboradores<span style="color: red;">*</span></div>
                                <div class="value">
                                    <div class="input-group">
                                        <div class="rs-select2 js-select-simple select--no-search">
                                            <select name="proyecto-colaboradores" onchange="actualizarColaboradores(this)" >
                                                <option disabled="disabled" selected="selected">Seleccione los correos de sus colaboradores</option>
                                            </select>
                                            <div class="select-dropdown"></div>
                                        </div>
                                                                         
                                        
                                    </div>
                                    
                                </div>
                            </div>
                            <div id="contenedor-colaboradores">
                                            <input type="hidden" name="proyecto-colaboradores-lista">
                                        </div>   
                                        
                            <div><p style="color: gray; font-style:italic">Para poder seleccionar el correo del colaborador, el colaborador deberá de estar previamente registrado en el sistema</p></div>
                        </div>
                        <div class="form-row">
                            <div class="name">Resultados esperados <br>(1 año) (700 caracteres sin espacios)<span style="color: red;">*</span></div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea  class="input--style-5 verifica700" name="proyecto-resultados " rows="4" data-toggle="tooltip" data-placement="top" title="Justificacion del proyecto" required style="width: 100%;"></textarea>
                                </div>
                            </div>
                        </div>


                        <?php 
                        if($_SESSION["typeUser"] == "2" || $_SESSION["typeUser"] == "3"){
                            //echo '<div class="card-heading2"><h2 class="title2">Responsable</h2><input type="email" name="proyecto-responsable" /></div>';
                        echo '<div class="form-row"> <div class="name">Responsable</div> <div class="value"> <div class="input-group verifica200"> <input  class="input--style-5" type="email" name="proyecto-responsable"> </div> </div> </div>';
                        } else {
                            echo '<input type="hidden" name="proyecto-responsable" value="' . $_SESSION["email"] . '"/>';
                        }
                        echo '<input type="hidden" name="tipo-usuario" value="' . $_SESSION["typeUser"] . '"/>';
                        ?>
                        <input type="hidden" name="proyecto-gestor" value="<?php echo $_SESSION["email"]; ?>"/>


                
                        <div class="form-row">
                            <div class="name">Cargar el resumen (PDF, 2Mb Maximo) <span style="color: red;">*</span></div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="resumen" name="resumen" required data-toggle="tooltip" data-placement="top" title="Anexe su resumen, maximo 2MB">
                                        <label class="custom-file-label" for="resumen">Seleccione el archivo</label>
                                    </div>
                                </div>
                            </div>
                            <p id="output"></p>                             
                        </div>




                        <!--div class="form-row">
                        <div class="name">Curriculum Vitae (PDF 2MB max)<span style="color: red;">*</span></div>
                        <div class="value">
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="cvu" name="cvu" required data-toggle="tooltip" data-placement="top" title="Anexe su CV, maximo 2MB">
                                    <label class="custom-file-label" for="cvu">Seleccione el archivo</label>
                                </div>                               
                            </div>
                        </div>        
                        <p id="output"></p>                 
                    </div-->


                        <div class="text-center">                           
                            <div class=" text-center ">
                                <button type="submit" class="btn btn--radius-2 btn--red" >Enviar solicitud</button>
                            </div>                           
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>


</div>
   

<script type="text/javascript" src="js/jquery.min.js"></script>

<script>

var personas = JSON.parse('["leonardo-alvarez@ipicyt.edu.mx", "emilio.hernandez@ipicyt.edu.mx", "jbhayet@cimat.mx"]');
construirColaboradores(personas);

$(document).ready(function(){
    var i=1;    
    //agregar
    $('#add').click(function(){
        i++;
        console.log("ADD");

        
        var field='<div id="row'+i+'">'+

        '<div class="form-row"><div class="name">Nombre</div> <div class="value"><div class="input-group">'+ 
        '<input class="input--style-5" type="text" name="ps-nombre[]">'+ 
        '</div></div></div>'+


    '<div class="form-row"><div class="name">Versión</div> <div class="value"><div class="input-group">'+ 
     '<input class="input--style-5" type="text" name="ps-version[]">'+ 
    '</div></div></div>'+

    '<div class="form-row"><div class="name">Tipo de licencia </div><div class="value"><div class="input-group">'+
            '<select class ="form-control" style="background-color: #e5e5e5;" name="ps-tipo[]" onchange="pideLicencia(this,'+i+')">'+
                '<option disabled="disabled" selected="selected">Escoge una opción</option><option value="0">No comercial</option><option value="1">Comercial</option>'+
            '</select>'+
    '</div></div></div>'+


    '<div class="form-row licencia'+i+'" style="display:none"><div class="name">Cargar Licencia </div><div class="value"><div class="input-group"><div class="custom-file">'+
    '<input type="file" class="custom-file-input" id="licencia'+i+'" name="ps-licencia[]">'+
    '<label class="custom-file-label" for="licencia">Seleccione el archivo</label>'+
    '</div></div></div></div>'+

    '<div class="form-row"> <div class="name">Sitio web<span style="color: red;">*</span></div> <div class="value"> <div class="input-group"> '+
    '<input class="input--style-5" type="text" name="ps-link[]" required> </div> </div></div>'+

    '<div class="form-row">  <div class="name"></div> <div class="value"> <div class="input-group"> '+
    '<button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove" >Remover</button></td> </div></div></div></div> </div>';



        $('#dynafields').append(field)


        $(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});

    });

    //Eliminar
    $(document).on('click' , '.btn_remove', function(){        
        var button_id= $(this).attr('id');
        console.log(button_id);

        $('#row'+button_id+'').remove();
        $('#row'+button_id+'').remove();
    });
});



    function validarGPUs(node) {
        if (node.value != 0) {
            //console.log("show justificación");
            $("textarea[name='proyecto-justificacion-gpu']").parent().parent().parent().css("display", "flex");
            $(".proyecto-justificacion-gpu").prop('required',true);            

        } else {
            console.log("hide justificación")
            $("textarea[name='proyecto-justificacion-gpu']").parent().parent().parent().css("display", "none");
            $(".proyecto-justificacion-gpu").prop('required',false);            
        }
    }



function pideLicencia(tipo, id) {     

console.log(id);
   if (tipo.value != 0) {          
    console.log("poner "+id);
       $(".licencia"+id).css("display", "flex");
       
   } else {
      console.log("quitar "+id);
       if($('.licencia'+id).length){$(".licencia"+id).css("display", "none");}
       
   }
}


    function seleccionarResumenPDF() {
        $("input[name='proyecto-resumen-pdf']").click();     

    }

    function construirColaboradores(personas) {

        var options = "";
        for (var i = 0; i < personas.length; i++)
            options += '<option value="' + personas[i] + '">' + personas[i] + '</option>';
        $("select[name='proyecto-colaboradores'] > option:nth-child(n+2)").remove();
        $("select[name='proyecto-colaboradores'] > option:nth-child(1)").prop('selected', true);
        $("select[name='proyecto-colaboradores']").append(options);
    }

    function actualizarColaboradores(nodo) {
        reservarSeleccionado(nodo.value);
        construirColaboradores(personas);
    }

    function reservarSeleccionado(email) {
        personas.splice(personas.indexOf(email), 1);
        $("#contenedor-colaboradores").append('<div class="colaborador-card">' + email + '<span onclick="eliminarColaborador(\'' + email + '\', this)">x</span></div>');
        var colaboradoresGuardados = $("input[name='proyecto-colaboradores-lista']").val();
        if(colaboradoresGuardados.length == 0)
            $("input[name='proyecto-colaboradores-lista']").val(email);
        else
            $("input[name='proyecto-colaboradores-lista']").val(colaboradoresGuardados + ";" + email);

    }

    function eliminarColaborador(email, node) {
        personas.push(email);
        $(node).parent().remove();
        var newValue = "";
        var cards = document.getElementsByClassName("colaborador-card");
        if(cards.length > 0){
            newValue = cards[0].firstChild.textContent;
            for (var i = 1; i < cards.length; i++) {
                newValue += ";" + cards[i].firstChild.textContent;
            }
        }
        $("input[name='proyecto-colaboradores-lista']").val(newValue);
        
        

        construirColaboradores(personas);
    }


	function cargarLicenciaPDF(node){
		$(node).parent().children("input[type='file']").click();
	}



function actualiza(campo){
    var fileName = campo.value.split("\\").pop();

    campo.classList.add("selected");

    campo.placeholder='MEKOS';


  console.log(fileName);
}

/*
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).value.split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
*/



$('#resumen').on('change', function() { 
    myfile= $( this ).val();
    var ext = myfile.split('.').pop();
    if(ext!="pdf"){
        alert("Solo se permiten Archivos PDF"); 
      $('#resumen').val('');
    }
    
    else {
        const size = (this.files[0].size / 1024 / 1024).toFixed(2); 
        if (size > 2 || size < 0) { 
            alert("Tamaño maximo permitido es de 2MB"); 
            $('#resumen').val('');
        } else { 
            $("#output").html('' + 
                'Tamaño del Archivo: ' + size + " MB" + ''); 
        } 
    }
}); 




$('.verifica200').bind('blur keyup change' ,function(){
    var chars= this.value.replace(/ /g,'').length;
    console.log(chars);    
    if(chars >= 200){
        var sinesp=conesp=0
        for(var i=0; sinesp<=200;i++)
        {   if(this.value.charAt(i)!=' ')
            {
                sinesp++;
            }            
            conesp++
        }        
        $valor=this.value.substring(0, conesp);
        console.log($valor);
        this.value=$valor;        
    }
});


$('.verifica700').bind('blur keyup change' ,function(){
    var chars= this.value.replace(/ /g,'').length;
    console.log(chars);    
    if(chars >= 700){
        var sinesp=conesp=0
        for(var i=0; sinesp<=700;i++)
        {   if(this.value.charAt(i)!=' ')
            {
                sinesp++;
            }            
            conesp++
        }        
        $valor=this.value.substring(0, conesp);
        console.log($valor);
        this.value=$valor;        
    }
});

 


/*
function verifica(name, max){
    
    var chars = $(name).val().replace(/ /g,'').length;
    if(chars>=max){
        alert("solo se permiten "+max+" chars you usseless piece of crap!!!");
        $valor=$(name).val().substring(0, 200);
        $(name).val($valor);
        console.log($valor);
        // $(name).val($(name).text().substring(0,200));
    }
}
*/
    </script>
        <!-- Intro -->







