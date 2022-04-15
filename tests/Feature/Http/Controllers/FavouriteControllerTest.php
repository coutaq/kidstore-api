<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Favourite;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\FavouriteController
 */
class FavouriteControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected()
    {
        $favourites = Favourite::factory()->count(3)->create();

        $response = $this->get(route('favourite.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\FavouriteController::class,
            'store',
            \App\Http\Requests\FavouriteStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves()
    {
        $response = $this->post(route('favourite.store'));

        $response->assertCreated();
        $response->assertJsonStructure([]);

        $this->assertDatabaseHas(favourites, [ /* ... */ ]);
    }


    /**
     * @test
     */
    public function show_behaves_as_expected()
    {
        $favourite = Favourite::factory()->create();

        $response = $this->get(route('favourite.show', $favourite));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\FavouriteController::class,
            'update',
            \App\Http\Requests\FavouriteUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected()
    {
        $favourite = Favourite::factory()->create();

        $response = $this->put(route('favourite.update', $favourite));

        $favourite->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with()
    {
        $favourite = Favourite::factory()->create();

        $response = $this->delete(route('favourite.destroy', $favourite));

        $response->assertNoContent();

        $this->assertDeleted($favourite);
    }
}
