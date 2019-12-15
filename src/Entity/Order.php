<?php

namespace Orders\Entity;

class Order
{
    /**
     * @var int
     */
    private $orderId;

    /**
     * @var bool
     */
    private $manual = false;

    /**
     * @var string
     */
    private $name;

    /**
     * @var array
     */
    private $items;

    /**
     * @var float
     */
    private $totalAmount;

    /**
     * @var string
     */
    private $deliveryDetails;

    private $valid = true;

    /**
     * @return int
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * @param int $orderId
     */
    public function setOrderId(int $orderId)
    {
        $this->orderId = $orderId;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param array $items
     */
    public function setItems(array $items)
    {
        $this->items = $items;
    }

    /**
     * @return array
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param float $totalAmount
     */
    public function setTotalAmount(float $totalAmount)
    {
        $this->totalAmount = $totalAmount;
    }

    /**
     * @return float
     */
    public function getTotalAmount()
    {
        return $this->totalAmount;
    }

    public function setDeliveryDetails($deliveryDetails)
    {
        $this->deliveryDetails = $deliveryDetails;
    }

    /**
     * @return string
     */
    public function getDeliveryDetails()
    {
        return $this->deliveryDetails;
    }

    /**
     * @param bool $manual
     */
    public function setManual($manual)
    {
        $this->manual = $manual;
    }

    /**
     * @return bool
     */
    public function isManual()
    {
        return $this->manual;
    }

    /**
     * @param mixed $valid
     */
    public function setValid($valid)
    {
        $this->valid = $valid;
    }

    /**
     * @return mixed
     */
    public function isValid()
    {
        return $this->valid;
    }
}
