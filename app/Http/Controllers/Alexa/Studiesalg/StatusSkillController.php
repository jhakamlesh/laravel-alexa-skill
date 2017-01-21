<?php

namespace App\Http\Controllers\Alexa\Studiesalg;

use App\Http\Controllers\Controller;
use App\Integrations\Studiesalg\Client;
use App\Integrations\Studiesalg\Orders;
use App\Integrations\Studiesalg\Status;
use Illuminate\Http\Request;

class StatusSkillController extends Controller
{

    /**
     * @var
     */
    private $studiesalg;

    /**
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->studiesalg = $client;
    }

    /**
     * @return $this
     */
    public function statusToday()
    {
        $status = new Status($this->studiesalg->orders()->open());

        return (new \Develpr\AlexaApp\Response\AlexaResponse(
            new \Develpr\AlexaApp\Response\Speech((string) $status),
            new \Develpr\AlexaApp\Response\Card((string) $status)
        ))->endSession();
    }

}

