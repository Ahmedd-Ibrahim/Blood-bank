<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\ClientNotification;

class ClientNotificationApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_client_notification()
    {
        $clientNotification = factory(ClientNotification::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/client_notifications', $clientNotification
        );

        $this->assertApiResponse($clientNotification);
    }

    /**
     * @test
     */
    public function test_read_client_notification()
    {
        $clientNotification = factory(ClientNotification::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/client_notifications/'.$clientNotification->id
        );

        $this->assertApiResponse($clientNotification->toArray());
    }

    /**
     * @test
     */
    public function test_update_client_notification()
    {
        $clientNotification = factory(ClientNotification::class)->create();
        $editedClientNotification = factory(ClientNotification::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/client_notifications/'.$clientNotification->id,
            $editedClientNotification
        );

        $this->assertApiResponse($editedClientNotification);
    }

    /**
     * @test
     */
    public function test_delete_client_notification()
    {
        $clientNotification = factory(ClientNotification::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/client_notifications/'.$clientNotification->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/client_notifications/'.$clientNotification->id
        );

        $this->response->assertStatus(404);
    }
}
