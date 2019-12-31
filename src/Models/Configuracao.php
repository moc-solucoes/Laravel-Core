<?php

namespace MOCSolutions\Core\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Configuracao
 * @package App\Http\Models\Auth
 */
class Configuracao extends Model
{
    protected $table = "ncl_configuracoes";
    public $timestamps = false;

    /**
     * @param $valores
     */
    public function setValores($valores)
    {
        $this->valores = json_encode($valores);
    }

    /**
     * @param $valores
     */
    public function getValores()
    {
        return $this->valores = json_decode($this->valores);
    }

    /**
     * @param $coluna
     * @return mixed
     */
    public static function getByColuna($coluna)
    {
       return self::where("coluna", $coluna)->get()->first();
    }
}
