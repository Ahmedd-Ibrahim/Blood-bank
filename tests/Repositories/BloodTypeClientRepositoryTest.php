<?php namespace Tests\Repositories;

use App\Models\BloodTypeClient;
use App\Repositories\BloodTypeClientRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class BloodTypeClientRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var BloodTypeClientRepository
     */
    protected $bloodTypeClientRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->bloodTypeClientRepo = \App::make(BloodTypeClientRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_blood_type_client()
    {
        $bloodTypeClient = factory(BloodTypeClient::class)->make()->toArray();

        $createdBloodTypeClient = $this->bloodTypeClientRepo->create($bloodTypeClient);

        $createdBloodTypeClient = $createdBloodTypeClient->toArray();
        $this->assertArrayHasKey('id', $createdBloodTypeClient);
        $this->assertNotNull($createdBloodTypeClient['id'], 'Created BloodTypeClient must have id specified');
        $this->assertNotNull(BloodTypeClient::find($createdBloodTypeClient['id']), 'BloodTypeClient with given id must be in DB');
        $this->assertModelData($bloodTypeClient, $createdBloodTypeClient);
    }

    /**
     * @test read
     */
    public function test_read_blood_type_client()
    {
        $bloodTypeClient = factory(BloodTypeClient::class)->create();

        $dbBloodTypeClient = $this->bloodTypeClientRepo->find($bloodTypeClient->id);

        $dbBloodTypeClient = $dbBloodTypeClient->toArray();
        $this->assertModelData($bloodTypeClient->toArray(), $dbBloodTypeClient);
    }

    /**
     * @test update
     */
    public function test_update_blood_type_client()
    {
        $bloodTypeClient = factory(BloodTypeClient::class)->create();
        $fakeBloodTypeClient = factory(BloodTypeClient::class)->make()->toArray();

        $updatedBloodTypeClient = $this->bloodTypeClientRepo->update($fakeBloodTypeClient, $bloodTypeClient->id);

        $this->assertModelData($fakeBloodTypeClient, $updatedBloodTypeClient->toArray());
        $dbBloodTypeClient = $this->bloodTypeClientRepo->find($bloodTypeClient->id);
        $this->assertModelData($fakeBloodTypeClient, $dbBloodTypeClient->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_blood_type_client()
    {
        $bloodTypeClient = factory(BloodTypeClient::class)->create();

        $resp = $this->bloodTypeClientRepo->delete($bloodTypeClient->id);

        $this->assertTrue($resp);
        $this->assertNull(BloodTypeClient::find($bloodTypeClient->id), 'BloodTypeClient should not exist in DB');
    }
}
