<?php

namespace App\Http\Controllers;

use App\Http\Requests\BasketStoreRequest;
use App\Http\Requests\BasketUpdateRequest;
use App\Http\Resources\BasketCollection;
use App\Http\Resources\BasketResource;
use App\Models\Basket;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\BasketCollection
     */
    public function index(Request $request)
    {
        $baskets = Basket::all();

        return new BasketCollection($baskets);
    }

    /**
     * @param \App\Http\Requests\BasketStoreRequest $request
     * @return \App\Http\Resources\BasketResource
     */
    public function store(BasketStoreRequest $request)
    {
        $basket = Basket::create($request->validated());

        return new BasketResource($basket);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Basket $basket
     * @return \App\Http\Resources\BasketResource
     */
    public function show(Request $request, Basket $basket)
    {
        return new BasketResource($basket);
    }

    /**
     * @param \App\Http\Requests\BasketUpdateRequest $request
     * @param \App\Models\Basket $basket
     * @return \App\Http\Resources\BasketResource
     */
    public function update(BasketUpdateRequest $request, Basket $basket)
    {
        $basket->update($request->validated());

        return new BasketResource($basket);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Basket $basket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Basket $basket)
    {
        $basket->delete();

        return response()->noContent();
    }
}
