<?php

namespace Orders\Tools\DeliveryCostsCalculator;

use Orders\Entity\Order;

/**
 * I've implemented this for the further case - may be you wil need to include some more delivery services
 * Like additional delivery services - 2 mans to delivery to flat, etc.
 *
 * Interface DeliveryCostsCalculatorInterface
 * @package Orders\Tools\DeliveryCostsCalculator
 */
interface DeliveryCostsCalculatorInterface
{
    public function calculate(Order $order);
}