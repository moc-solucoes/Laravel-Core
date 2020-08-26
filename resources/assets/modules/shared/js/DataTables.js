function RenderDataTableOnGet(route, translate, columns, CallBack, nome) {
    nome = nome == null ? '.dataTable' : nome;

    $(nome).DataTable({
        "aaSorting": [[0, "desc"]],
        "language": {
            "url": translate
        },
        "autoWidth": true,
        "ajax": {
            url: route,
            dataType: 'json',
            type: 'GET'
        },
        "columns": columns,
        "drawCallback": CallBack
    });
}

function RenderDataTableServerSideOnPost(route, translate, columns, CallBack, nome, post) {
    nome = nome == null ? '.dataTable' : nome;

    var config = getConfigBase(translate, post);

    config.ajax.url = route;
    config.columns = columns;

    tblNoticias = $(nome).DataTable(config);
}

function getConfigBase(translate, post) {
    var configBase = {
        bLengthChange: false,
        ordering: false,
        dom: '<"pull-left"f>tpir', //Trtip
        language: {
            url: translate
        },
        serverSide: true,
        processing: true,
        ajax: {
            type: "POST",
            data: post,
        },
        drawCallback: initDocument
    };

    return configBase;
}

$(document).ready(function () {
    function excluir() {
        var url = rotaExcluir + '/' + $(this).data('id');
        $(this).addClass('disabled');
        $(this).addAttr('disabled');
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