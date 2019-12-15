<?php

namespace Orders\Validator;

use Orders\Entity\Order;

class OrderValidator
{
    private $minimumAmount = 0;

    public function setMinimumAmount(int $amount)
    {
        $this->minimumAmount = $amount;

        return $this;
    }

    /**
     * @param $order Order
     */
    public function validate(Order $order)
    {
        if (
            !is_string($order->getName())
            || !(strlen($order->getName()) > 2)
            || !($order->getTotalAmount() > 0)
            || $order->getTotalAmount() < $this->minimumAmount
        ) {
            return $order->setValid(false);
        }

        foreach ($order->getItems() as $itemId) {
            if (!is_int($itemId)) {
                return $order->setValid(false);
            }
        }
    }
}
