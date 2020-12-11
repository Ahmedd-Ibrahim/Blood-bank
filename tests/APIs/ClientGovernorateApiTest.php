<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\ClientGovernorate;

class ClientGovernorateApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_client_governorate()
    {
        $clientGovernorate = factory(ClientGovernorate::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/client_governorates', $clientGovernorate
        );

        $this->assertApiResponse($clientGovernorate);
    }

    /**
     * @test
     */
    public function test_read_client_governorate()
    {
        $clientGovernorate = factory(ClientGovernorate::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/client_governorates/'.$clientGovernorate->id
        );

        $this->assertApiResponse($clientGovernorate->toArray());
    }

    /**
     * @test
     */
    public function test_update_client_governorate()
    {
        $clientGovernorate = factory(ClientGovernorate::class)->create();
        $editedClientGovernorate = factory(ClientGovernorate::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/client_governorates/'.$clientGovernorate->id,
            $editedClientGovernorate
        );

        $this->assertApiResponse($editedClientGovernorate);
    }

    /**
     * @test
     */
    public function test_delete_client_governorate()
    {
        $clientGovernorate = factory(ClientGovernorate::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/client_governorates/'.$clientGovernorate->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/client_governorates/'.$clientGovernorate->id
        );

        $this->response->assertStatus(404);
    }
}
