<?php

use Orders\Entity\Order;
use Orders\Tools\DeliveryCostsCalculator\DeliveryCostLargeItemsCalculator;
use Orders\Tools\DeliveryDetailsResolver\OrderDeliveryDetails;
use Orders\Processor\OrderProcessor;
use Orders\Tools\OrderPrinterFile;
use Orders\Logger\ConsoleLogger;
use Orders\Logger\FileLogger;

require_once 'vendor/autoload.php';

$config = [
    'minimumAmount' => file_get_contents('input/minimumAmount'),
    'logFileName' => __DIR__ . '/orderProcessLog'
];

$order = new Order();
$order->setOrderId(2);
$order->setName('John');
$order->setItems([ 6654 ]);
$order->setTotalAmount(346.2);

$orderProcessor = new OrderProcessor(
    new OrderDeliveryDetails(),
    (new Orders\Validator\OrderValidator())
        ->setMinimumAmount($config['minimumAmount']),
    new OrderPrinterFile(),
    (new FileLogger())
        ->setLogFileName($config['logFileName']),
    new DeliveryCostLargeItemsCalculator()
);

$orderProcessor->process($order);
