<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Http\Resources\OrderResource;
use App\services\OrderService;
use Exception;

class OrderController extends Controller
{
    private OrderService $service;
    public function __construct(OrderService $service)
    {
        $this->service = $service;
    }

    public function store(OrderRequest $request)
    {
        try {
            $order = $this->service->createOrder(
                auth('api')->id(),
                $request->validated()['items']
            );

            return new OrderResource($order);

        } catch (Exception $ex) {
            return response()->json([
                'message' => $ex->getMessage(),
            ], 422);
        }
    }
}
