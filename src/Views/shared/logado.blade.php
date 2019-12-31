<!DOCTYPE html>
<html lang="pt">
<head>
    <title> Sistema contabil </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="cache-control" content="public"/>
    <meta name="Author" content="Maike Oliveira Carvalho - MOC Solutions"/>
    <meta name="ROBOTS" content="ALL"/>
    <meta name="robots" content="index,follow"/>
    <meta name="googlebot" content="index,follow"/>
    <meta name="google" value="translate"/>
    <meta name="revisit-after" content="01 day"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <link rel="shortcut icon" href="http://mocspeak.net/images/ico/favicon.ico">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ url('assets/template/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ url('assets/template/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ url('assets/template/css/smartadmin-production.min.css') }}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ url('assets/template/css/smartadmin-skins.min.css') }}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ url('assets/template/css/smartadmin-moc.css') }}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ url('assets/template/css/demo.min.css') }}">
    <script src="{{ url('assets/template/js/libs/jquery-2.0.2.min.js') }}"></script>

</head>
<!--<body class="desktop-detected menu-on-top pace-done smart-style-2">-->
<body class="<?=LAYOUT?>">
<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

    ga('create', '<?=ANALITYCS?>', 'auto');
    ga('send', 'pageview');
</script>
<!--<body class="desktop-detected pace-done smart-style-1">-->
<!--<body class="smart-style-1">-->
<!-- #HEADER -->
<header id="header">
    <div id="logo-group">
        <span id="logo">
            <img src="<?=URL_LOGO?>" alt="<?=EMPRESA_NOME?>" style='width: 100px; height: 45px; margin-top: -10px;'>
        </span>
        <?php
        include "views/notificacoes.php";
        ?>
    </div>
    <!-- end dropdown -->
    <div class="pull-right">
        <!-- collapse menu button -->
        <div id="hide-menu" class="btn-header pull-right">
            <span> <a href="javascript:void(0);" data-action="toggleMenu" title="Collapse Menu"><i
                        class="fa fa-reorder"></i></a> </span>
        </div>
        <ul id="mobile-profile-img" class="header-dropdown-list hidden-xs padding-5">
            <li class="">
                <a href="#" class="dropdown-toggle no-margin userdropdown" id='img_perfil' data-toggle="dropdown">
                    <img src="img/avatars/
								<?=file_exists($_SERVER['DOCUMENT_ROOT'] . "/img/avatars/" . URL_CENTRAL . "/" . $Globais->usuario->id . ".png") ? $Globais->usuario->id : "male"?>.png"
                         alt="<?=$Globais->usuario->nome?>" title='<?=$Globais->usuario->nome?>'
                         style='width: 35px; height: 35px;' class="online"/>
                </a>
                <ul class="dropdown-menu pull-right">
                    <li style='font-size: 81%;'><i class="fa fa-user"></i> <?php echo $Globais->usuario->nome; ?> </li>
                    <li class="divider"></li>
                    <li><a href="#" class="padding-10 padding-top-0 padding-bottom-0"><i
                                class="fa fa-cogs"></i> <?=$idioma->configuracoes?></a></li>
                    <li class="divider"></li>
                    <li>
                        <a href="meus-dados" class="padding-10 padding-top-0 padding-bottom-0"> <i
                                class="fa fa-user"></i> <?=$idioma->meus_dados?></a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#" class="padding-10 padding-top-0 padding-bottom-0"> <i
                                class="fa fa-save"></i> <?=$idioma->backup?></a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#" class="padding-10 padding-top-0 padding-bottom-0" data-action="toggleShortcut"><i
                                class="fa fa-arrow-up"></i> <?=$idioma->meu_plano?></a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#" class="padding-10 padding-top-0 padding-bottom-0" data-action="launchFullscreen"><i
                                class="fa fa-arrows-alt"></i> <?=$idioma->tela_cheia?></a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="sair" class="padding-10 padding-top-5 padding-bottom-5"><i
                                class="fa fa-sign-out fa-lg"></i> <strong><?=$idioma->sair?></strong></a>
                    </li>
                </ul>
            </li>
        </ul>

        <!-- end logout button -->

        <!-- search mobile button (this is hidden till mobile view port) -->
        <div id="search-mobile" class="btn-header transparent pull-right">
            <span> <a href="#" title="Search"><i class="fa fa-search"></i></a> </span>
        </div>
        <!-- end search mobile button -->

        <!-- fullscreen button -->
        <div id="fullscreen" class="btn-header transparent pull-right">
            <span> <a href="#" data-action="launchFullscreen" title="Tela Cheia"><i
                        class="fa fa-arrows-alt"></i></a> </span>
        </div>
        <!-- end fullscreen button -->

        <!-- multiple lang dropdown : find all flags in the flags page -->
        <ul class="header-dropdown-list hidden-xs">
            <li>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <?php
                    switch ($Globais->idioma) {
                        case 'es':
                            echo '<img src="img/blank.gif" class="flag flag-es" alt="Español"> <span> Español </span> <i class="fa fa-angle-down"></i> ';
                            break;
                        case 'br':
                            echo '<img src="img/blank.gif" class="flag flag-br" alt="Português"> <span> Português </span> <i class="fa fa-angle-down"></i> ';
                            break;
                        case 'en':
                            echo '<img src="img/blank.gif" class="flag flag-us" alt="English"> <span> English </span> <i class="fa fa-angle-down"></i> ';
                            break;
                        default:
                            echo '<img src="img/blank.gif" class="flag flag-us" alt="English"> <span> English </span> <i class="fa fa-angle-down"></i> ';
                            break;
                    }
                    ?>

                </a>
                <ul class="dropdown-menu pull-right">
                    <li class="<?=$Globais->idioma == "br" ? "active" : ""?>">
                        <a href="idioma/br"><img src="img/blank.gif" class="flag flag-br" alt="Brasil"> Português </a>
                    </li>
                    <li class="<?=$Globais->idioma == "en" ? "active" : ""?>">
                        <a href="idioma/en"><img src="img/blank.gif" class="flag flag-us" alt="English"> English</a>
                    </li>
                    <li class="<?=$Globais->idioma == "es" ? "active" : ""?>">
                        <a href="idioma/es"><img src="img/blank.gif" class="flag flag-es" alt="Español"> Español</a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- end multiple lang -->

    </div>
    <!-- end pulled right: nav area -->

</header>
<aside id="left-panel">
    <!-- Informação do usuário -->
    <div class="login-info">
				<span>
					<a href="#" id="show-shortcut" data-action="toggleShortcut">
                        <img src="img/avatars/
								<?=file_exists($_SERVER['DOCUMENT_ROOT'] . "/img/avatars/" . URL_CENTRAL . "/" . $Globais->usuario->id . ".png") ? $Globais->usuario->id : "male"; ?>.png"
                             alt="<?=$Globais->usuario->nome; ?>" title='<?=$Globais->usuario->nome?>'
                             style='width: 35px; height: 35px;' class="online"/>
                        <i class="fa fa-angle-down"></i>
                        <?=$Globais->usuario->nome?>
                    </a>

				</span>
    </div>
    <nav>
        <ul>
            <?php
            include "menu.php";
            ?>
        </ul>
    </nav>
    <span class="minifyme" data-action="minifyMenu">
        <i class="fa fa-arrow-circle-left hit"></i>
    </span>
</aside>
<!-- Fim menu -->

<!-- Div Principal -->
<div id="main" role="main">
    <div id="ribbon" style="padding-top: 10px;">
        <?=$master_atalho?>
    </div>
    <div id="content">
        <!-- Atalhos -->
        <div class="row">
            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
                <h1 class="page-title txt-color-blueDark">
                    <?=$master_titulo?>
                </h1>
            </div>
            <?php if($perfil->permitir("estatistica_geral")){ ?>
            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
                <ul id="sparks">
                    <li class="sparks-info">
                        <h5> Rendimentos (Bra)
                            <span class="txt-color-blue">
										<?php
                                $fatura = new Fatura();
                                $Cliente = new Cliente();

                                $rendimento = $fatura->faturamento_mensal(date('m'), date('Y'));
                                echo $rendimento['bra'];
                                ?>
									</span>
                        </h5>
                    </li>
                    <li class="sparks-info">
                        <h5> Rendimentos (Eua)
                            <span class="txt-color-blue">
										<?=$rendimento['eua']?>
									</span>
                        </h5>
                    </li>
                    <li class="sparks-info">
                        <h5> Total
                            <span class="txt-color-blue">
										<i class="fa fa-arrow-circle-up" data-rel="bootstrap-tooltip"
                                           title="Increased"></i>
                                <?=$rendimento['total']?>
									</span>
                        </h5>
                    </li>
                </ul>
            </div>
            <?php } ?>

        </div>
        <!-- Fim Atalhos -->
        <!-- conteúdo -->
        <div class="row row-centered" style='margin: auto; '>
            <?=$master_conteudo?>
        </div>
        <!-- Fim conteúdo -->
    </div>
</div>
<!-- END MAIN PANEL -->

<!-- PAGE FOOTER -->
<div class="page-footer fixed-footer">
    <div class="row">
        <div class="col-xs-12 col-sm-3">
            <span class="txt-color-white"><a href='http://www.mocsolucoes.com.br' target='_BLANK'> MOC Soluções </a>© 2014</span>
        </div>
        <div class="col-xs-12 col-sm-3 text-center">
					<span class="txt-color-white">

					<b> Seu Ip: </b><?=$_SERVER['REMOTE_ADDR']?></span>
        </div>

        <div class="col-xs-6 col-sm-6 text-right hidden-xs">
            <div class="txt-color-white inline-block">
                <i class="txt-color-blueLight hidden-mobile">Ultimo login da conta <i class="fa fa-clock-o"></i>
                    <strong> 27/09/2014 às 14:27:05 &nbsp;</strong> </i>
            </div>
        </div>
    </div>
</div>
<!-- END PAGE FOOTER -->
<div id="shortcut">
    <ul>
        <li>
            <img src="img/avatars/
					<?php echo file_exists($_SERVER['DOCUMENT_ROOT'] . "/img/avatars/" . $Globais->usuario->id . ".png") ? $Globais->usuario->id : "male"; ?>.png"
                 alt="<?php echo $Globais->usuario->nome; ?>" title='<?=$Globais->usuario->nome?>' class="online"/>
        </li>
        <li>
            Bem vindo <?=$Globais->usuario->nome?>.
        </li>
    </ul>
</div>

<script src="js/libs/jquery-ui-1.10.3.min.js"></script>
<script src="js/libs/jquery.form.js"></script>

<script src="js/app.config.js"></script>

<script src="js/bootstrap/bootstrap.min.js"></script>

<!-- CUSTOM NOTIFICATION -->
<script src="js/notification/SmartNotification.min.js"></script>

<!-- JARVIS WIDGETS -->
<script src="js/smartwidgets/jarvis.widget.min.js"></script>

<!--[if IE 8]>
<h1>Seu browser é muito antigo, Por favor faça a atualização no site oficial - www.microsoft.com/download</h1>
<![endif]-->

<script src="js/app.min.js"></script>
<script src="js/funcoes.js"></script>

<!-- Opções tabelas de dados -->
<script src="js/plugin/datatables/jquery.dataTables.min.js"></script>
<script src="js/plugin/datatables/dataTables.colVis.min.js"></script>
<script src="js/plugin/datatables/dataTables.tableTools.min.js"></script>
<script src="js/plugin/datatables/dataTables.bootstrap.min.js"></script>
<script src="js/plugin/datatables/datatables.responsive.min.js"></script>
<script src="js/plugin/x-editable/moment.min.js"></script>
<script src="js/plugin/x-editable/jquery.mockjax.min.js"></script>
<script src="js/plugin/x-editable/x-editable.min.js"></script>
<script src="http://mocsolucoes.com.br/biblioteca/js/mascara.js"></script>
<script src="js/ckeditor/ckeditor.js"></script>
<script src="js/pagseguro/pagSeguro.js"></script>

<script src="js/plugin/morris/raphael.min.js"></script>
<script src="js/plugin/morris/morris.min.js"></script>

<script type="text/javascript">
    $(".btn-pagseguro").click(function () {
        var codigo = $(this).attr('codigo');
        //alert(codigo);
        PagSeguroLightbox(codigo);
    });

    $(document).ready(function () {
        pageSetUp();

        if (tabela_dados != "") {
            tabela_dados();
        }
        $(function () {
            $("[data-toggle='tooltip']").tooltip();
        });

        $("input[name='data']").mask("99/99/9999");
        $("input[name='telefone1']").mask("(99)9999-9999");
        $("input[name='telefone2']").mask("(99)9999-9999");
        $("input[name='cep']").mask("99.999-999");
        $("input[name='cpf']").mask("999.999.999-99");

        $("#btn_frm_compra").click(function () {
            $(".msg_retorno").html("<div class='alert alert-warning'><button data-dismiss='alert' class='close'>	× </button><i class='fa fa-fw fa-spinner fa-spin'></i><code><b>Atenção</b></code> Aguarde enquanto O servidor está sendo criado. <i class='fa fa-fw fa-spinner fa-spin'></i></div>");
            var valor = $("#frm_compra").serializeArray();
            $.post("http://<?=URL_CENTRAL?>/webservice/central.php", valor, function (data) {
                $(".msg_retorno").html(data);
            }).success(function (data) {
                $(".msg_retorno").html(data);
            }).fail(function (data) {
                $(".msg_retorno").html(data);
            });
        });
    });

    var id_usuario = '<?=$Globais->usuario->id?>';
    var total_noticias = '<?=$qtd_noticias_total?>';

    $(".noticias").click(function () {
        $.ajax({
            method: "POST",
            url: "views/forms/atualiza_noticias.php",
            dataType: "json",
            data: {'qtd_noticias': total_noticias}
            //context: document.body
        }).done(function (msg) {
            //$(this).addClass("done");
            //alert("Atualizado. "+msg.);
            console.log("Atualizado: " + msg);
        }).fail(function (jqXHR, textStatus) {
            console.log("Erro problema ao atualizar: " + textStatus);
        });
        //alert("teste");
    });

    $("select[name=uf]").change(function () {
        var uf = $(this).val();
        //alert(uf);
        $("select[name=cidade]").load('views/forms/option_cidades.php', {uf: uf});
    });

    $(".registro").click(function () {
        var id = $(this).attr("numero");
        var pagina = $(this).attr("pagina");
        $("#edicao").load('views/forms/frm_' + pagina + '.php', {id: id});
        $("#edicao").show();
    });

    $("#user").change(function () {
        $('#formUpload').ajaxForm({
            uploadProgress: function (event, position, total, percentComplete) {
                $('.progress').addClass("active");
                $('progress').css('width', percentComplete);
                //$('#porcentagem').html(percentComplete+'%');
            },
            success: function (data) {
                $('progress').css('width', '100%');
                //$('#porcentagem').html('100%');
                if (data.sucesso == true) {
                    $('.retorno').html('<img src="' + data.msg + '" style="cursor: pointer" title="Clique aqui para mudar sua foto." />');
                    $('#img_perfil').html('<img src="' + data.msg + '" class="online" />');
                }
                else {
                    $('.retorno').html(data.msg);
                }
            },
            error: function () {
                $('.retorno').html('Erro ao enviar requisição!!!');
            },
            dataType: 'json',
            url: 'upload',

            resetForm: true
        }).submit();
    });

    //Inicio Campos editáveis (tabelas)
    $.mockjax({
        url: '/post',
        response: function (settings) {
            log(settings, this);
        }
    });

    //TODO: add this div to page
    function log(settings, response) {
        var s = [],
            str;
        s.push(settings.type.toUpperCase() + ' url = "' + settings.url + '"');
        for (var a in settings.data) {
            if (settings.data[a] && typeof settings.data[a] === 'object') {
                str = [];
                for (var j in settings.data[a]) {
                    str.push(j + ': "' + settings.data[a][j] + '"');
                }
                str = '{ ' + str.join(', ') + ' }';
            } else {
                str = '"' + settings.data[a] + '"';
            }
            s.push(a + ' = ' + str);
        }
        s.push('RESPONSE: status = ' + response.status);

        if (response.responseText) {
            if ($.isArray(response.responseText)) {
                s.push('[');
                $.each(response.responseText, function (i, v) {
                    s.push('{value: ' + v.value + ', text: "' + v.text + '"}');
                });
                s.push(']');
            } else {
                s.push($.trim(response.responseText));
            }
        }
        s.push('--------------------------------------\n');
        $('#console').val(s.join('\n') + $('#console').val());
    }

    //$.fn.editable.defaults.mode = 'inline'; use this to edit inline


    //alert(id_usuario);
    //editables
    $('#nome').editable({url: 'editar-dados-pessoais', name: 'nome', pk: id_usuario});
    $('#email').editable({url: 'editar-dados-pessoais', name: 'email', pk: id_usuario});
    $('#cpf').editable({url: 'editar-dados-pessoais', name: 'cpf', pk: id_usuario});
    $('#telefone').editable({url: 'editar-dados-pessoais', name: 'telefone', pk: id_usuario});
    $('#senha').editable({url: 'editar-dados-pessoais', name: 'senha', pk: id_usuario});

    function onFocus() {
        document.getElementById('eMessage').innerHTML = '<b>' + this.name + ' is focused </b>';
    }

    function onBlur() {
        document.getElementById('eMessage').innerHTML = this.name + ' lost focus';
    }

    CKEDITOR.config.height = "500";
    CKEDITOR.replaceAll('ckEditor', {});

</script>

<script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-XXXXXXXX-X']);
    _gaq.push(['_trackPageview']);

    (function () {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
    })();

</script>

</body>

</html>
<?php
#ob_end_clean();
?>
