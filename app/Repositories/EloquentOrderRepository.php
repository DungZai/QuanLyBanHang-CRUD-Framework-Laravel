<?php

namespace App\Repositories;

use App\Contracts\OrderRepositoryInterface;
use App\Models\Order;
use App\Models\OrderItem;
use Override;

class EloquentOrderRepository implements OrderRepositoryInterface
{
   #[Override]
   public function createOrder(int $userId, float $totalAmount): Order
   {

      return Order::create([
         'user_id' => $userId,
         'total_amount' => $totalAmount,
      ]);
   }


   #[Override]
   public function createOrderItem(int $orderId, int $productId, int $quantity, int $price, float $subtotal): OrderItem
   {

      return OrderItem::create([
         'order_id' => $orderId,
         'product_id' => $productId,
         'quantity' => $quantity,
         'price' => $price,
         'subtotal' => $subtotal,
      ]);
   }
}
