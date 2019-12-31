function initDocument() {
    $('[data-toggle="tooltip"]').tooltip();
    $('body').tooltip({selector: '.dataTable label [title]'});
}

$(document).ready(function () {
    initDocument();

    function excluir() {
        var url = rotaExcluir + '/' + $(this).data('id');
        $(this).addClass('disabled');
        $(this).attr('disabled', 'disabled');
        window.location.replace(url);
    }

    function confirmaExclusao() {
        var registro = $(this).data('registro');
        var id = $(this).data('id');

        $('.modalDetalheRegistro').html(registro);
        $('.confirmaExclusao').data('id', id);
    }

    $(document).on('click', '.btn-excluir', confirmaExclusao);
    $(document).on('click', '.confirmaExclusao', excluir);
});
