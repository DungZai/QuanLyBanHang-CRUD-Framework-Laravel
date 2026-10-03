<?php

namespace App\Contracts;

use App\Models\Order;
use App\Models\OrderItem;

interface OrderRepositoryInterface
{                                                                           
    public function createOrder(int $userId, float $totalAmount): Order;

    public function createOrderItem(int $orderId, int $productId, int $quantity, int $price, float $subtotal): OrderItem;
                                                                                      
}
