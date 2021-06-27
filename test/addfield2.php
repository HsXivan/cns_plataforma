<html>
	<head>
		<title>DeRP</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	</head>
	<body>
		<div class="container">
            <br>
            <h2 align="center">DErP</h2>
            <div class="form-group">
                <form name ="add_name" id="add_name">
                    <table class="table table-bordered" id="dynamic_field">
                        <tr>
                            <td><input type="text" name="name[]" id="name" placeholder="Name" class="form-control name_list"></td>
                            <td><button type="button" name="add" id="add" class="btn btn-success">Add moar</button></td>
                        </tr>
                        <tr>


        
                        </tr>



                    </table>

                    <input type="button" name="submit" id="submit" value="submit" class="btn btn-info">

                </form>
            </div>


        </div>
    </body>
</html>

<script>
$(document).ready(function(){

    var i=1;
    
    //agregar
    $('#add').click(function(){

        i++;
        console.log("ADD");


var field='<div id="row'+i+'"> <div class="form-row software-box"><div class="form-row"><div class="name">Nombre</div><div class="input-group">'+
            '<input class="input--style-5" type="text" name="ps-nombre[]"> '+
        '</div></div></div> '+


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

    '<div class="form-row"> <div class="name">Sitio web</div> <div class="value"> <div class="input-group"> '+
    '<input class="input--style-5" type="text" name="ps-link[]"> </div> </div></div>'+

    '<div class="form-row">  <div class="name"></div> <div class="value"> <div class="input-group"> '+
    '<button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove" >Remeve</button></td> </div></div></div></div> </div>';


      

        $('#dynamic_field').append(field)


        

    });

    //Eliminar
    $(document).on('click' , '.btn_remove', function(){
        
        var button_id= $(this).attr('id');
        console.log(button_id);
        $('#row'+button_id+'').remove();
        $('#row'+button_id+'').remove();
    });


  



    $('#submit').click(function(){
        $.ajax({
            url:"name.php",
            method:"POST",
            data:$("#add_name").serialize(),
            
            success:function(data){
                alert(data);
                $('#add_name')[0].reset();
            }
        });
    });



});


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

</script>
