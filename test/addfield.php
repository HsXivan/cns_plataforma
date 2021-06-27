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
        $('#dynamic_field').append('<tr id="row'+i+'">'+
                            '<td ><input type="text" name="name[]" id="name" class="form-control name_list" placeholder="Name"></td>'+
                            '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove" >Remeve</button></td>'+
                        '</tr>')


        

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


</script>
