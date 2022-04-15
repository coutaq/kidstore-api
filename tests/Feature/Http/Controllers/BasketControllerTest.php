<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Basket;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\BasketController
 */
class BasketControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected()
    {
        $baskets = Basket::factory()->count(3)->create();

        $response = $this->get(route('basket.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\BasketController::class,
            'store',
            \App\Http\Requests\BasketStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves()
    {
        $user = User::factory()->create();
        $product = Product::factory()->create();

        $response = $this->post(route('basket.store'), [
            'user_id' => $user->id,
            'product_id' => $product->id,
        ]);

        $baskets = Basket::query()
            ->where('user_id', $user->id)
            ->where('product_id', $product->id)
            ->get();
        $this->assertCount(1, $baskets);
        $basket = $baskets->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function show_behaves_as_expected()
    {
        $basket = Basket::factory()->create();

        $response = $this->get(route('basket.show', $basket));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\BasketController::class,
            'update',
            \App\Http\Requests\BasketUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected()
    {
        $basket = Basket::factory()->create();
        $user = User::factory()->create();
        $product = Product::factory()->create();

        $response = $this->put(route('basket.update', $basket), [
            'user_id' => $user->id,
            'product_id' => $product->id,
        ]);

        $basket->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($user->id, $basket->user_id);
        $this->assertEquals($product->id, $basket->product_id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with()
    {
        $basket = Basket::factory()->create();

        $response = $this->delete(route('basket.destroy', $basket));

        $response->assertNoContent();

        $this->assertDeleted($basket);
    }
}
