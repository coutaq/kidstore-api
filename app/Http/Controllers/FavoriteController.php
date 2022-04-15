<?php

namespace App\Http\Controllers;

use App\Http\Requests\FavoriteStoreRequest;
use App\Http\Requests\FavoriteUpdateRequest;
use App\Http\Resources\FavoriteCollection;
use App\Http\Resources\FavoriteResource;
use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\FavoriteCollection
     */
    public function index(Request $request)
    {
        $favorites = Favorite::all();

        return new FavoriteCollection($favorites);
    }

    /**
     * @param \App\Http\Requests\FavoriteStoreRequest $request
     * @return \App\Http\Resources\FavoriteResource
     */
    public function store(FavoriteStoreRequest $request)
    {
        $favorite = Favorite::create($request->validated());

        return new FavoriteResource($favorite);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Favorite $favorite
     * @return \App\Http\Resources\FavoriteResource
     */
    public function show(Request $request, Favorite $favorite)
    {
        return new FavoriteResource($favorite);
    }

    /**
     * @param \App\Http\Requests\FavoriteUpdateRequest $request
     * @param \App\Models\Favorite $favorite
     * @return \App\Http\Resources\FavoriteResource
     */
    public function update(FavoriteUpdateRequest $request, Favorite $favorite)
    {
        $favorite->update($request->validated());

        return new FavoriteResource($favorite);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Favorite $favorite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Favorite $favorite)
    {
        $favorite->delete();

        return response()->noContent();
    }
}
