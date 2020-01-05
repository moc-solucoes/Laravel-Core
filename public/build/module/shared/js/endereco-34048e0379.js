$(document).ready(function () {
    /**
     * Correio preencher com o cep.
     */
    $(".cep").blur(function () {
        var elemento = $(this).closest('.endereco');
        elemento.find('.estado').focus().val("Carregando...");
        elemento.find('.cidade').focus().val("Carregando...");
        elemento.find('.bairro').focus().val("Carregando...");
        elemento.find('.endereco').focus().val("Carregando...");

        var cepLimpo = $(this).val().replace("-", "").replace(".", "");

        $.getJSON("https://viacep.com.br/ws/" + cepLimpo + "/json", function (data) {
            elemento.find('.estado').val(data.uf);
            elemento.find('.cidade').val(data.localidade);
            elemento.find('.bairro').val(data.bairro);
            elemento.find('.endereco').val(data.logradouro);
        }).fail(function (err) {
            elemento.find(".estado, .cidade, .bairro, .endereco").val("Não foi possível carregar.").removeAttr("readonly");
        });
    });
});

//# sourceMappingURL=endereco.js.map
