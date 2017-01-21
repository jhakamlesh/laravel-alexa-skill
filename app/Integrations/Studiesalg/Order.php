<?php

namespace App\Integrations\Studiesalg;


use Carbon\Carbon;

class Order
{

    /**
     * @var array
     */
    private $data;

    /**
     * @var string
     */
    private $tz = 'Europe/Copenhagen';

    /**
     * @param $data
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * @param $key
     * @return mixed
     */
    public function get($key)
    {
        return $this->data[$key];
    }

    /**
     * @return mixed
     */
    public function createdToday()
    {
        return ($date = $this->date('Tid_oprettet')) !== null? $date->isToday() : false;
    }

    /**
     * @return bool
     */
    public function needsFollowUp()
    {
        return ($date = $this->date('Tid_opfølg')) !== null? $date->isToday() : false;
    }

    /**
     * @return bool
     */
    public function needsBankTransfer()
    {
        return ($date = $this->date('Tid_modtaget')) !== null
            ? $date->addDays(15)->startOfDay()->lte(Carbon::tomorrow($this->tz)->endOfDay())
            : false;
    }

    // _________________________________________________________________________________________________________________

    /**
     * @param $key
     * @return Carbon
     */
    private function date($key)
    {
        if(($date = $this->get($key)) == '0') {
            return null;
        }
        return Carbon::createFromTimestamp($date, $this->tz);
    }

}