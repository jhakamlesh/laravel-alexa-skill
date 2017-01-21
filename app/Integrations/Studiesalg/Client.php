<?php

namespace App\Integrations\Studiesalg;


/**
 * Class Client
 * @package App\Integrations\Studiesalg
 */
class Client
{

    /**
     * @var string
     */
    private $endpoint = 'https://www.studiesalg.dk/api';

    /**
     * @var
     */
    private $key;

    /**
     * @param $apiKey
     */
    public function __construct($apiKey)
    {
        $this->key = $apiKey;
    }

    /**
     * @param $resource
     * @param $params
     * @return mixed
     */
    public function get($resource, $params)
    {
        $query = http_build_query(array_merge($params, ['auth_token' => $this->key]));

        return json_decode(
            file_get_contents($this->endpoint.'/'.$resource.'.php?'.$query), true
        );
    }

    /**
     * @return Orders
     */
    public function orders()
    {
        return (new Orders($this));
    }

}