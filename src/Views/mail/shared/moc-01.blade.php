<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>@yield('assunto')</title>
</head>
<body>
<div style='margin: 0px; background-color: #f7f2e4;' bgcolor='#f7f2e4' leftmargin='0'>
    <table cellspacing='0' border='0' cellpadding='0' width='100%' bgcolor='#f7f2e4'>
        <tr>
            <td>
                <!--top links-->
                <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                    <tr>
                        <td valign='middle' align='center' height='45'>
                            <p style='font-size: 14px; line-height: 24px; font-family: Georgia; color: #b0a08b; margin: 0px;'>
                                Não consegue ver o conteúdo corretamente? <a style='color: #2989D8;
							text-decoration: none;' href='#'>Utilize a
                                    versão web.</a></p></td>
                    </tr>
                </table>
                <!--header-->
                <table
                    style='background:url({{asset('email/header-bg.jpg')}}); background-repeat: no-repeat; background-position: center; background-color: #fffdf9;'
                    width='684' border='0' align='center' cellpadding='0' cellspacing='0'>
                    <tr>
                        <td>
                            <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                <tr>
                                    <td valign='top' width='173'>
                                        <!--ribbon-->
                                        <table border='0' cellspacing='0' cellpadding='0'>
                                            <tr>
                                                <td height='120' width='45'></td>
                                                <td background='{{asset('email/ribbon_blue.jpg')}}'
                                                    valign='top' bgcolor='#c72439' height='120' width='80'>
                                                    <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                                        <tr>
                                                            <td valign='bottom' align='center' height='35'>
                                                                <p style='font-size: 14px; font-family: Georgia, Times, serif; color: #ffffff; margin-top: 0px; margin-bottom: 0px;'>
                                                                    {{(new \MOCSolutions\Core\Classes\Globais())->getMesNome(date("m"))}}
                                                                </p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td valign='top' align='center'>
                                                                <p style='font-size: 36px; font-family: Georgia, Times, serif; color: #ffffff; margin-top: 0px; margin-bottom: 0px; text-shadow: 1px 1px 1px #333;'>
                                                                    {{date('d')}}
                                                                </p>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table><!--ribbon-->
                                    </td>
                                    <td valign='middle' width='493'>
                                        <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                            <tr>
                                                <td height='60'>
                                                    <b> Sr(a).:</b> @yield('nome')
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h1 style='color: #333; margin-top: 0px;  margin-left:120px; margin-bottom: 0px; font-weight: normal; font-size: 30px; font-family: Georgia, \"Times New Roman\", Times, serif'>
                                                        <a href='{{url('/')}}'>
                                                            <img src='{{asset('email/logo.png')}}'
                                                                 style='width: 120px;'/>
                                                        </a>
                                                    </h1>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th height='40'>
                                                    <b>
                                                        <i> Seu serviço com melhor preço e maior Qualidade! </i>
                                                    </b>
                                                </th>
                                            </tr>
                                        </table>
                                        <!--date-->
                                        <table border='0' cellspacing='0' cellpadding='0'>
                                            <tr>
                                                <td valign='top' align='center' bgcolor='#312c26'
                                                    background='{{asset('email/date-bg.jpg')}}' width='430'
                                                    height='42'>
                                                    <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                                        <tr style='font-family: Georgia, \"Times New Roman\", Times, serif;'>
                                                            <td height='5'>
                                                                <div
                                                                    style="color: #fff !important; font-size: 24px; text-align: center;">
                                                                    <span>@yield('assunto')</span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                        <!--/date-->
                                    </td>
                                    <td width='18'></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <div style='max-width: 664px; margin: auto; background:#fff; padding: 10px; margin-top: 0px;'>
                    @yield('content')

                    <p>
                        Para acessar automaticamente a Central do Cliente <a href="{{url('/')}}" target="_blank"> Clique
                            aqui</a>.
                    </p>
                </div>
                <table bgcolor='#fffdf9' cellspacing='0' border='0' align='center' cellpadding='0' width='684'>
                    <tr>
                        <td height='72'>
                            <img src='{{asset('email/line-break-2.jpg')}}' width='622' height='72'/>
                        </td>
                    </tr>
                    <tr>
                        <td height='72'>
                            Entre já e confira:
                            <a style='color: #2989D8; text-decoration: none;' href='{{env('INFO_SITE')}}'>
                                MOC Soluções
                            </a> <br/>
                            Acesse seu painel do Cliente:
                            <a style='color: #2989D8; text-decoration: none;' href='{{url('/')}}'>
                                Painel do Cliente
                            </a> <br/>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <table width='680' border='0' align='center' cellpadding='30' cellspacing='0'>
        <tr>
            <td valign='top'>
                <p style='font-size: 14px; line-height: 24px; color: #b0a08b; margin: 0px;'>
                    <b> <i> Contatos: </i> </b> <br/>
                    <b> Telefone: </b> {{env('INFO_TELEFONE')}} <br/>
                    <b> E-mail: </b> {{env('MAIL_USERNAME')}}
            </td>
        </tr>
    </table>
</div>

</body>
</html>
