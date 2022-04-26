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
use Spatie\Activitylog\LogOptions;
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

    public function getByUrl($url)
    {
        return $this->where('url', $url)->first();
    }
}
