$(document).ready(function(){
    $('.description').click(function(){
        //Guardamos id en una variable
        let id = $(this).attr("id");
        //Consultamos información a bd al controlador AJAX
        $.ajax({
            type: "GET",
            url: "index.php?act=descripcion",//Función a consultar
            data: id,
            success: function(data){
                //Guardamos información procesada en JSON
                descrtp = JSON.parse(data);
                for(x=0; x<descrtp[0].length; x++){//Desglosamos y comparamos id con el json para obtener descripcion
                    if(id == descrtp[0][x].iditem){
                        $('#text-description').html(descrtp[0][x].descripcion); //Insertamos descripcion de item
                    }
                }
            }
        });
    });

    $('#padre_menu').change(function(){
        //Guardamos valores de campos
        ps = $('#padre_menu').val();
        item = $('#item').val();
        //Comparamos que ambos campos no estén vacios; de lo contrario, se habilitará el botón de guardar
        if(ps!='-- Seleccione una opcion --' && item!=""){
            $('#button-confirm').prop('disabled', false);
        }else{
            $('#button-confirm').prop('disabled', true);
        }
    });
    $('#item').keydown(function(){
        //Guardamos valores de campos
        ps = $('#padre_menu').val();
        item = $('#item').val();
        //Comparamos que ambos campos no estén vacios; de lo contrario, se habilitará el botón de guardar
        if(ps!='-- Seleccione una opcion --' && item!=""){
            $('#button-confirm').prop('disabled', false);
        }else{
            $('#button-confirm').prop('disabled', true);
        }
    });
});
