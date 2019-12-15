<?php

namespace Orders\Tools;

use Orders\Entity\Order;

class OrderPrinterFile implements OrderPrinterInterface
{
    public function output(Order $order)
    {
        file_put_contents('result',
            sprintf(
                '%d-%s-%s-%d-%.2f-%s' . PHP_EOL,
                $order->getOrderId(),
                implode(',', $order->getItems()),
                $order->getDeliveryDetails(),
                $order->isManual() ? 1 : 0,
                $order->getTotalAmount(),
                $order->getName()
            ),
            FILE_APPEND
        );
    }
}