<?php
/**
 * Created by PhpStorm.
 * User: maike.carvalho
 * Date: 02/08/2018
 * Time: 16:37
 */

namespace MOCSolutions\Core\Models;

use MOCSolutions\Auth\Models\Usuario;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Documento
 * @package MOCSolutions\Core\Models
 * @property int Id
 * @property int id_usuario
 * @property string tipo
 * @property string numero
 * @property string completo
 * @property bool ativo true
 * @property datetime dt_criacao
 */
class Documento extends Model
{
    protected $table = 'ncl_documentos';
    public $timestamps = false;

    public function Usuarios()
    {

        return $this->hasOne(
            Usuario::class,
            'id_usuario',
            'id');
    }

    public function setCpf($cpf)
    {
        $this->tipo = 'cpf';
        $this->numero = $this->replace($cpf);

        return $this;
    }

    public function setDocumentoCompleto($documento)
    {
        $this->completo = json_encode($documento);

        return $this;
    }

    private function replace($number)
    {
        return str_replace(['.', '_', '-', ' '], ['', '', '', ''], $number);
    }
}
