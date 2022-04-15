<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderStoreRequest;
use App\Http\Resources\OrderCollection;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\OrderCollection
     */
    public function index(Request $request)
    {
        $orders = Order::all();

        return new OrderCollection($orders);
    }

    /**
     * @param \App\Http\Requests\OrderStoreRequest $request
     * @return \App\Http\Resources\OrderResource
     */
    public function store(OrderStoreRequest $request)
    {
        $order = Order::create($request->validated());

        return new OrderResource($order);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Order $order
     * @return \App\Http\Resources\OrderResource
     */
    public function show(Request $request, Order $order)
    {
        return new OrderResource($order);
    }
}
