$(document).ready(function () {
    /**
     * Correio preencher com o cep.
     */
    $(".cep").blur(function () {
        $(".estado").focus().val("Carregando...");
        $(".cidade").focus().val("Carregando...");
        $(".bairro").focus().val("Carregando...");
        $(".endereco").focus().val("Carregando...");

        var cepLimpo = $(this).val().replace("-", "").replace(".", "");

        $.getJSON("https://viacep.com.br/ws/" + cepLimpo + "/json", function (data) {
            $(".estado").val(data.uf);
            $(".cidade").val(data.localidade);
            $(".bairro").val(data.bairro);
            $(".endereco").val(data.logradouro);
        }).fail(function (err) {
            $(".estado, .cidade, .bairro, .endereco").val("Não foi possível carregar.").removeAttr("readonly");
        });
    });
});

//# sourceMappingURL=endereco.js.map
