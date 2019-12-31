<?php
/**
 * Created by PhpStorm.
 * User: maike.carvalho
 * Date: 01/08/2018
 * Time: 14:36
 */

namespace MOCSolutions\Core\Models;

use MOCSolutions\Auth\Models\Usuario;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Projeto
 * @package MOCSolutions\Core\Models
 * @property integer id
 * @property integer id_empresa
 * @property string Nome
 * @property string Prazo
 * @property boolean ativo
 * @property datetime dt_criacao
 */
class Projeto extends Model
{
    protected $table = 'ncl_projetos';
    public $timestamps = false;

    public function RedmineProjeto()
    {
        return $this->hasOne(
            \App\Http\Models\Redmine\Projeto::class,
            'id_projeto',
            'id');
    }

    public function Usuarios()
    {
        return $this->belongsToMany(
            Usuario::class,
            'ncl_projeto_usuario',
            'id_projeto',
            'id_usuario'
        );
    }

    public function hasUser($usuario)
    {
        $return = false;

        foreach ($this->Usuarios as $user) {
            if ($user->id == $usuario->id) {
                $return = true;
            }
        }

        return $return;
    }
}
