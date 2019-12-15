<?php

namespace Orders\Tools\DeliveryCostsCalculator;

use Orders\Entity\Order;

class DeliveryCostLargeItemsCalculator implements DeliveryCostsCalculatorInterface
{
    public function calculate(Order $order)
    {
        foreach ($order->getItems() as $item) {
            if (in_array($item, [3231, 9823])) {
                $order->setTotalAmount($order->getTotalAmount() + 100);
            }
        }
    }
}