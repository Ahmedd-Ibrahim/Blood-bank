<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\ClientPost;

class ClientPostApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_client_post()
    {
        $clientPost = factory(ClientPost::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/client_posts', $clientPost
        );

        $this->assertApiResponse($clientPost);
    }

    /**
     * @test
     */
    public function test_read_client_post()
    {
        $clientPost = factory(ClientPost::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/client_posts/'.$clientPost->id
        );

        $this->assertApiResponse($clientPost->toArray());
    }

    /**
     * @test
     */
    public function test_update_client_post()
    {
        $clientPost = factory(ClientPost::class)->create();
        $editedClientPost = factory(ClientPost::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/client_posts/'.$clientPost->id,
            $editedClientPost
        );

        $this->assertApiResponse($editedClientPost);
    }

    /**
     * @test
     */
    public function test_delete_client_post()
    {
        $clientPost = factory(ClientPost::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/client_posts/'.$clientPost->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/client_posts/'.$clientPost->id
        );

        $this->response->assertStatus(404);
    }
}
