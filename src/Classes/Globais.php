<?php

namespace MOCSolutions\Core\Classes;

class Globais
{
    public $url;
    public $logo;
    public $line2;
    public $ribbonBlue;
    public $headerBg;
    public $dateBg;

    public $ano;
    public $mes;
    public $mesNome;
    public $dia;

    public $site;
    public $telefone;
    public $email;

    public function __construct()
    {
        $this->url = url('/');
        $this->logo = asset('email/logo.png');
        $this->line2 = asset('email/line-break-2.jpg');
        $this->ribbonBlue = asset('email/ribbon_blue.jpg');
        $this->headerBg = asset('email/header-bg.jpg');
        $this->dateBg = asset('email/date-bg.jpg');

        $this->ano = date("Y");
        $this->mes = date("m");
        $this->mesNome = $this->getMesNome(date("m"));
        $this->dia = date('d');

        $this->site = env('INFO_SITE');
        $this->telefone = env('INFO_TELEFONE');
        $this->email = env('MAIL_USERNAME');
    }

    public function getMesNome($mes) {
        switch ($mes) {
            case 1: return "Janeiro";
            case 2: return "Fevereiro";
            case 3: return "Março";
            case 4: return "Abril";
            case 5: return "Maio";
            case 6: return "Junho";
            case 7: return "Julho";
            case 8: return "Agosto";
            case 9: return "Setembro";
            case 10: return "Outubro";
            case 11: return "Novembro";
            case 12: return "Dezembro";
            default: return "Não encontrado";
        }
    }
}
