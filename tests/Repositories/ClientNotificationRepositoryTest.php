<?php namespace Tests\Repositories;

use App\Models\ClientNotification;
use App\Repositories\ClientNotificationRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ClientNotificationRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ClientNotificationRepository
     */
    protected $clientNotificationRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->clientNotificationRepo = \App::make(ClientNotificationRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_client_notification()
    {
        $clientNotification = factory(ClientNotification::class)->make()->toArray();

        $createdClientNotification = $this->clientNotificationRepo->create($clientNotification);

        $createdClientNotification = $createdClientNotification->toArray();
        $this->assertArrayHasKey('id', $createdClientNotification);
        $this->assertNotNull($createdClientNotification['id'], 'Created ClientNotification must have id specified');
        $this->assertNotNull(ClientNotification::find($createdClientNotification['id']), 'ClientNotification with given id must be in DB');
        $this->assertModelData($clientNotification, $createdClientNotification);
    }

    /**
     * @test read
     */
    public function test_read_client_notification()
    {
        $clientNotification = factory(ClientNotification::class)->create();

        $dbClientNotification = $this->clientNotificationRepo->find($clientNotification->id);

        $dbClientNotification = $dbClientNotification->toArray();
        $this->assertModelData($clientNotification->toArray(), $dbClientNotification);
    }

    /**
     * @test update
     */
    public function test_update_client_notification()
    {
        $clientNotification = factory(ClientNotification::class)->create();
        $fakeClientNotification = factory(ClientNotification::class)->make()->toArray();

        $updatedClientNotification = $this->clientNotificationRepo->update($fakeClientNotification, $clientNotification->id);

        $this->assertModelData($fakeClientNotification, $updatedClientNotification->toArray());
        $dbClientNotification = $this->clientNotificationRepo->find($clientNotification->id);
        $this->assertModelData($fakeClientNotification, $dbClientNotification->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_client_notification()
    {
        $clientNotification = factory(ClientNotification::class)->create();

        $resp = $this->clientNotificationRepo->delete($clientNotification->id);

        $this->assertTrue($resp);
        $this->assertNull(ClientNotification::find($clientNotification->id), 'ClientNotification should not exist in DB');
    }
}
