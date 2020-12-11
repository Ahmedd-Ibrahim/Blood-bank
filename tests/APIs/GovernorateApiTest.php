<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Governorate;

class GovernorateApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_governorate()
    {
        $governorate = factory(Governorate::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/governorates', $governorate
        );

        $this->assertApiResponse($governorate);
    }

    /**
     * @test
     */
    public function test_read_governorate()
    {
        $governorate = factory(Governorate::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/governorates/'.$governorate->id
        );

        $this->assertApiResponse($governorate->toArray());
    }

    /**
     * @test
     */
    public function test_update_governorate()
    {
        $governorate = factory(Governorate::class)->create();
        $editedGovernorate = factory(Governorate::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/governorates/'.$governorate->id,
            $editedGovernorate
        );

        $this->assertApiResponse($editedGovernorate);
    }

    /**
     * @test
     */
    public function test_delete_governorate()
    {
        $governorate = factory(Governorate::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/governorates/'.$governorate->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/governorates/'.$governorate->id
        );

        $this->response->assertStatus(404);
    }
}
