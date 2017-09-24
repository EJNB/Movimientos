$(document).ready(function(){
    PNotify.prototype.options.styling = "bootstrap3";
    $('.link-tooltip').tooltip();

    //pasar el data-url para el enlace del modal
    $('.link-eliminar').click(function(){
        var description = 'Estas seguro de eliminar este registro',
            url = $(this).attr('data-url');
        $('.modal-body')
            .children('p')
                .html(description)
            .end()
                .next().find('a.btn').attr('href',url);
        ;
    })

    //seleccionar las personas pertenecientes a la instalacion
    $('.selectpicker').change(function(){
        var url = $(this).attr('data-url');
        //alert(url);
        $.ajax({
            url : url,
            data : { nombre : 'Javier' },
            type : "POST",
            success : function(response){
                alert(response)
            },
            error : function(){
                alert('error')
            },
            complete : function(){
                alert('Se ha completado su peticion')
            }
        })
    });
});