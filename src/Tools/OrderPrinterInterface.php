<?php

namespace Orders\Tools;

use Orders\Entity\Order;

/**
 * This is implemented cause for example if yo'll decide to send this order after calculation to some API
 * fot further processing
 *
 * Interface OrderPrinterInterface
 * @package Orders\Tools
 */
interface OrderPrinterInterface
{
    public function output(Order $order);
}