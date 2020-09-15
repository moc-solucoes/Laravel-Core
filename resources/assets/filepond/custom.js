/**
 * Your custom code here.
 */
$(document).ready(function () {
    FilePond.registerPlugin(FilePondPluginFileValidateSize, FilePondPluginFileValidateType);

    FilePond.setOptions(translate);
// Turn input element into a pond with configuration options
    $(".filepond").filepond({
        allowMultiple: true,
        maxFiles: 30,
        onupdatefiles: (files) => {
            // console.error('onupdatefiles', $arquivo.data.arquivo.id);
        },
        onprocessfile: (error, file) => {
            // console.error('onprocessfile', file.serverId);
        },
        onprocessfilestart: (file) => {
            // console.error('onprocessfilestart', file);
        },
        onprocessfileprogress: (file, progress) => {
            // console.error('onprocessfileprogress', file);
        },
        onprocessfilerevert: (file) => {
            // console.error('onprocessfilerevert', file.serverId);
        },
        server: {
            process: {
                url: routeProccessFile,
                method: 'POST',
                headers: {
                    'X-CSRF-Token': $('[name="_token"]').val(),
                },
            },
            revert: {
                url: routeDeleteFile,
                method: 'DELETE',
                headers: {
                    'X-CSRF-Token': $('[name="_token"]').val(),
                    'Content-Type': 'text/json; charset=UTF-8'
                },
            }
        },
        lang: 'pt-BR'
    });
});