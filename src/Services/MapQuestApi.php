<?php

namespace MOCSolutions\Core\Services;

use App\Http\Models\Auth\Usuario;
use GuzzleHttp\Client;
use MOCUtils\Helpers\SlackException;

class MapQuestApi
{
    protected $valores;
    protected $client;
    protected $options;
    protected $sufixRoute;

    public function __construct()
    {
        $this->valores = (object)$this->valores;
        $this->valores->apiUrl = 'http://www.mapquestapi.com/';

        $this->options = ['headers' =>
            [
                "Content-Type" => "application/json; charset=utf-8",
                'Accept' => 'application/json',
            ],
        ];

        $this->client = new Client(['timeout' => 4.0]);

        return $this;
    }

    /**
     * @param string $address
     * @return mixed
     * @throws SlackException
     */
    public function address($address)
    {
        $this->sufixRoute = "geocoding/v1/address?key=" . env('MAPQUESTAPI_KEY') . "&location=" . $address;

        try {
            $res = $this->client->post($this->valores->apiUrl . $this->sufixRoute);

            return json_decode($res->getBody()->getContents());
        } catch (\Exception $e) {
            throw new SlackException($e->getMessage());
        }
    }

    /**
     * @param $object
     */
    public function setObject($object)
    {
        $this->options["body"] = json_encode($object);
    }
}
