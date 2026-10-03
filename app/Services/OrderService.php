<?php

namespace App\Services;

use App\Contracts\OrderRepositoryInterface;
use App\Contracts\ProductRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\DB;

class OrderService
{
    private OrderRepositoryInterface $repositoryOrder;
    private ProductRepositoryInterface $repositoryProduct;

    public function __construct(OrderRepositoryInterface $repositoryOrder, ProductRepositoryInterface $repositoryProduct)
    {
        $this->repositoryOrder = $repositoryOrder;
        $this->repositoryProduct = $repositoryProduct;
    }


    public function createOrder(int $userId, array $items)
    {
        
        return DB::transaction( function() use($userId, $items) {

            $totalAmount = 0;    
            foreach ($items as $item) {
                $product = $this->repositoryProduct->findById($item['product_id']);

                if ($item['quantity'] > $product->quantity) {
                    throw new Exception('Không đủ tồn kho');
                }

                $totalAmount += $item['quantity'] * $product->price;
            }

            $order = $this->repositoryOrder->createOrder($userId, $totalAmount);

            foreach ($items as $item) {
                $this->createOrderItem(
                    $order->id,
                    $item['product_id'],
                    $item['quantity'],
                );

                $product = $this->repositoryProduct->findById($item['product_id']);
                $remainingQuantity = $product->quantity - $item['quantity'];

                $this->repositoryProduct->export($item['product_id'], $remainingQuantity);
            }

            $order->load('orderItems');

        return $order;
        });    
    }

   
    public function createOrderItem(int $orderId, int $productId, int $quantity)
    {
        $product = $this->repositoryProduct->findById($productId);

        $price = $product->price;

        $subtotal = $quantity * $price;

        return $this->repositoryOrder->createOrderItem($orderId, $productId, $quantity, $price, $subtotal);
    }

    
}
