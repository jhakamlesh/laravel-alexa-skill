<?php

namespace App\Integrations\Studiesalg;


use Illuminate\Support\Collection;

class Status {

    /**
     * @var int
     */
    public $needsBankTransfer = 0;

    /**
     * @var int
     */
    public $needsFollowUp = 0;

    /**
     * @var int
     */
    public $createdToday = 0;

    /**
     * @param Collection $orders
     */
    public function __construct(Collection $orders)
    {
        $this->needsBankTransfer = $orders->filter(function(Order $order) {
            return $order->needsBankTransfer();
        })->count();

        $this->needsFollowUp = $orders->filter(function(Order $order) {
            return $order->needsFollowUp();
        })->count();

        $this->createdToday = $orders->filter(function(Order $order) {
            return $order->createdToday();
        })->count();
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $nl = "\n";
        $speech =
            ($this->createdToday? 'Today there has been '. $this->createdToday.' new orders on Studiesalg.'.$nl : '').
            ($this->needsFollowUp? 'There are '. $this->needsFollowUp.' orders that needs your attention.'.$nl : '').
            ($this->needsBankTransfer? $this->needsBankTransfer.' orders needs bank transfer today.' : '');

        return $speech?: 'Nothing is up on Studiesalg. Sit back and relax.';
    }

}