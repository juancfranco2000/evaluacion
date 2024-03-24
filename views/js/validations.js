$(document).ready(function(){
    $('#padre_menu').change(function(){
        ps = $('#padre_menu').val();
        item = $('#item').val();
        if(ps!='-- Seleccione una opcion --' && item!=""){
            $('#button-confirm').prop('disabled', false);
        }else{
            $('#button-confirm').prop('disabled', true);
        }
    });
    $('#item').keydown(function(){
        ps = $('#padre_menu').val();
        item = $('#item').val();
        if(ps!='-- Seleccione una opcion --' && item!=""){
            $('#button-confirm').prop('disabled', false);
        }else{
            $('#button-confirm').prop('disabled', true);
        }
    });
});
