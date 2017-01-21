<?php

namespace App\Integrations\Studiesalg;


class Orders
{

    /**
     * @var Client
     */
    private $client;

    /**
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function open()
    {
        return $this->createCollection(
            $this->client->get('orders', ['filter' => 'open'])
        );
    }

    /**
     * @param array $orders
     * @return static
     */
    private function createCollection(array $orders)
    {
        return collect($orders)->map(function($order) {
            return new Order($order);
        });
    }

}