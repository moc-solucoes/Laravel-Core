<?php
/**
 * Created by PhpStorm.
 * User: maike.carvalho
 * Date: 02/08/2018
 * Time: 16:37
 */

namespace MOCSolutions\Core\Models;

use Illuminate\Database\Eloquent\Model;
use MOCSolutions\Core\Services\MapQuestApi;

/**
 * Class Endereco
 * @package MOCSolutions\Core\Models
 * @property int id
 * @property string cep
 * @property string estado
 * @property string cidade
 * @property string bairro
 * @property string logradouro
 * @property string numero
 * @property string complemento
 * @property string address
 * @property string lat
 * @property string lng
 * @property string request
 */
class Endereco extends Model
{
    protected $table = 'ncl_enderecos';

    public function formatToApi()
    {
        return $this->logradouro . ', ' . $this->numero . ', ' . $this->bairro . ', ' . $this->cidade . ', ' . $this->estado . ', Brasil';
    }

    public function setCoordenate()
    {
        if (!env('MAPQUESTAPI_KEY')) throw new \Exception("Set in your <code>.env</code> the MAPQUESTAPI_KEY.");

        $mapApi = (new MapQuestApi())->address($this->address);
        $this->request = json_encode($mapApi);
        $this->lat = $mapApi->results->locations[0]->latLng->lat;
        $this->lng = $mapApi->results->locations[0]->latLng->lng;

    }
}
