<?php

namespace Orders\Processor;

use Orders\Entity\Order;
use Orders\Tools\DeliveryCostsCalculator\DeliveryCostsCalculatorInterface;
use Orders\Tools\OrderPrinterInterface;
use Orders\Validator\OrderValidator;
use Orders\Tools\DeliveryDetailsResolver\OrderDeliveryDetails;
use Psr\Log\LoggerInterface;

class OrderProcessor
{
    /**
     * @var OrderValidator
     */
    private $validator;
    /**
     * @var OrderDeliveryDetails
     */
    private $orderDeliveryDetails;

    /**
     * @var OrderPrinterInterface
     */
    private $printer;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @var DeliveryCostsCalculatorInterface
     */
    private $deliveryCostsCalculator;

    public function __construct(
        OrderDeliveryDetails $orderDeliveryDetails,
        OrderValidator $validator,
        OrderPrinterInterface $printer,
        LoggerInterface $logger,
        DeliveryCostsCalculatorInterface $deliveryCostsCalculator
    ) {
        $this->orderDeliveryDetails = $orderDeliveryDetails;
        $this->validator = $validator;
        $this->printer = $printer;
        $this->logger = $logger;
        $this->deliveryCostsCalculator = $deliveryCostsCalculator;
    }

    /**
     * @param $order Order
     */
    public function process(Order $order)
    {
        $this->logger->info(sprintf("Processing started, OrderId: %d", $order->getOrderId()));

        $this->validator->validate($order);

        if (false === $order->isValid()) {
            $this->logger->error("Order is invalid");
            return;
        }

        $this->logger->info("Order is valid");

        $this->deliveryCostsCalculator->calculate($order);

        $this->logger->info(
            sprintf(
                "Order %d %s",
                $order->getOrderId(),
                $order->isManual() ? " NEEDS MANUAL PROCESSING" : " WILL BE PROCESSED AUTOMATICALLY"
            )
        );

        $order->setDeliveryDetails(
            $this
                ->orderDeliveryDetails
                ->getDeliveryDetails(count($order->getItems()))
        );

        $this->printer->output($order);
    }
}
