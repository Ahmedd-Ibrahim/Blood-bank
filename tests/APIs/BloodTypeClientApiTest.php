<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\BloodTypeClient;

class BloodTypeClientApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_blood_type_client()
    {
        $bloodTypeClient = factory(BloodTypeClient::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/blood_type_clients', $bloodTypeClient
        );

        $this->assertApiResponse($bloodTypeClient);
    }

    /**
     * @test
     */
    public function test_read_blood_type_client()
    {
        $bloodTypeClient = factory(BloodTypeClient::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/blood_type_clients/'.$bloodTypeClient->id
        );

        $this->assertApiResponse($bloodTypeClient->toArray());
    }

    /**
     * @test
     */
    public function test_update_blood_type_client()
    {
        $bloodTypeClient = factory(BloodTypeClient::class)->create();
        $editedBloodTypeClient = factory(BloodTypeClient::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/blood_type_clients/'.$bloodTypeClient->id,
            $editedBloodTypeClient
        );

        $this->assertApiResponse($editedBloodTypeClient);
    }

    /**
     * @test
     */
    public function test_delete_blood_type_client()
    {
        $bloodTypeClient = factory(BloodTypeClient::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/blood_type_clients/'.$bloodTypeClient->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/blood_type_clients/'.$bloodTypeClient->id
        );

        $this->response->assertStatus(404);
    }
}
