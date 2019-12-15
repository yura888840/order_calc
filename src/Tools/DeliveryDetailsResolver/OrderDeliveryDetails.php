<?php

namespace Orders\Tools\DeliveryDetailsResolver;

class OrderDeliveryDetails
{
	public static function getDeliveryDetails($productsCount)
	{
		if ($productsCount > 1) {
			return 'Order delivery time: 2 days';
		}

        return 'Order delivery time: 1 day';
	}
}