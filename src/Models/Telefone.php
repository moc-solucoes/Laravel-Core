<?php
/**
 * Created by PhpStorm.
 * User: maike.carvalho
 * Date: 02/08/2018
 * Time: 16:37
 */

namespace MOCSolutions\Core\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use MOCSolutions\Auth\Models\Usuario;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * Class Telefone
 * @package MOCSolutions\Core\Models
 * @property int Id
 * @property string Area +55
 * @property string ddd
 * @property string telefone
 * @property enum[Celular, Residêncial] tipo
 * @property bool ativo true
 * @property datetime dt_criacao
 */
class Telefone extends Model
{
    protected $table = 'ncl_telefones';

    use SoftDeletes, LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logExcept(['updated_at'])
            ->logOnly(['*'])
            ->useLogName('Core')
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs();
    }

    public function Usuarios()
    {

        return $this->belongsToMany(
            Usuario::class,
            'ncl_usuario_telefone',
            'id_telefone',
            'id_usuario');
    }

    public function setTelefone($telefone)
    {
        $telefone = $this->replace($telefone);

        $this->ddd = substr($telefone, 0, 2);
        $this->telefone = substr($telefone, 2);
    }

    public function getTelefone()
    {
        return '(' . $this->ddd . ') ' . substr_replace($this->telefone, '-', 4, 0);
    }

    private function replace($number)
    {
        return str_replace(['(', ')', '_', '-', ' '], ['', '', '', '', ''], $number);
    }

    private function insertInPosition($str, $pos, $c)
    {
        return substr($str, 0, $pos) . $c . substr($str, $pos);
    }
}
