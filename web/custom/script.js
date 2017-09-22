$(document).ready(function(){
    PNotify.prototype.options.styling = "bootstrap3";
    $('.link-tooltip').tooltip();

    //pasar
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
});