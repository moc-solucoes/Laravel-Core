<?php
/**
 * Created by PhpStorm.
 * User: maike.carvalho
 * Date: 02/08/2018
 * Time: 16:37
 */

namespace MOCSolutions\Core\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * Class Arquivo
 * @package MOCSolutions\Core\Models
 * @property string nome
 * @property string tamanho
 * @property string tipo
 * @property string extensao
 * @property string url
 */
class Arquivo extends Model
{
    protected $table = 'core_arquivos';
    protected static $logName = 'Core';
    protected static $logAttributes = ['*'];
    protected static $logAttributesToIgnore = ['updated_at'];
    protected static $logOnlyDirty = true;

    use SoftDeletes, LogsActivity;
}
