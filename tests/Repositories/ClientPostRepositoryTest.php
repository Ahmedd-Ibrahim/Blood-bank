<?php namespace Tests\Repositories;

use App\Models\ClientPost;
use App\Repositories\ClientPostRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ClientPostRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ClientPostRepository
     */
    protected $clientPostRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->clientPostRepo = \App::make(ClientPostRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_client_post()
    {
        $clientPost = factory(ClientPost::class)->make()->toArray();

        $createdClientPost = $this->clientPostRepo->create($clientPost);

        $createdClientPost = $createdClientPost->toArray();
        $this->assertArrayHasKey('id', $createdClientPost);
        $this->assertNotNull($createdClientPost['id'], 'Created ClientPost must have id specified');
        $this->assertNotNull(ClientPost::find($createdClientPost['id']), 'ClientPost with given id must be in DB');
        $this->assertModelData($clientPost, $createdClientPost);
    }

    /**
     * @test read
     */
    public function test_read_client_post()
    {
        $clientPost = factory(ClientPost::class)->create();

        $dbClientPost = $this->clientPostRepo->find($clientPost->id);

        $dbClientPost = $dbClientPost->toArray();
        $this->assertModelData($clientPost->toArray(), $dbClientPost);
    }

    /**
     * @test update
     */
    public function test_update_client_post()
    {
        $clientPost = factory(ClientPost::class)->create();
        $fakeClientPost = factory(ClientPost::class)->make()->toArray();

        $updatedClientPost = $this->clientPostRepo->update($fakeClientPost, $clientPost->id);

        $this->assertModelData($fakeClientPost, $updatedClientPost->toArray());
        $dbClientPost = $this->clientPostRepo->find($clientPost->id);
        $this->assertModelData($fakeClientPost, $dbClientPost->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_client_post()
    {
        $clientPost = factory(ClientPost::class)->create();

        $resp = $this->clientPostRepo->delete($clientPost->id);

        $this->assertTrue($resp);
        $this->assertNull(ClientPost::find($clientPost->id), 'ClientPost should not exist in DB');
    }
}
