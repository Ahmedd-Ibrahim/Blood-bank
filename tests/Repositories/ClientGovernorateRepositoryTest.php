<?php namespace Tests\Repositories;

use App\Models\ClientGovernorate;
use App\Repositories\ClientGovernorateRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ClientGovernorateRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ClientGovernorateRepository
     */
    protected $clientGovernorateRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->clientGovernorateRepo = \App::make(ClientGovernorateRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_client_governorate()
    {
        $clientGovernorate = factory(ClientGovernorate::class)->make()->toArray();

        $createdClientGovernorate = $this->clientGovernorateRepo->create($clientGovernorate);

        $createdClientGovernorate = $createdClientGovernorate->toArray();
        $this->assertArrayHasKey('id', $createdClientGovernorate);
        $this->assertNotNull($createdClientGovernorate['id'], 'Created ClientGovernorate must have id specified');
        $this->assertNotNull(ClientGovernorate::find($createdClientGovernorate['id']), 'ClientGovernorate with given id must be in DB');
        $this->assertModelData($clientGovernorate, $createdClientGovernorate);
    }

    /**
     * @test read
     */
    public function test_read_client_governorate()
    {
        $clientGovernorate = factory(ClientGovernorate::class)->create();

        $dbClientGovernorate = $this->clientGovernorateRepo->find($clientGovernorate->id);

        $dbClientGovernorate = $dbClientGovernorate->toArray();
        $this->assertModelData($clientGovernorate->toArray(), $dbClientGovernorate);
    }

    /**
     * @test update
     */
    public function test_update_client_governorate()
    {
        $clientGovernorate = factory(ClientGovernorate::class)->create();
        $fakeClientGovernorate = factory(ClientGovernorate::class)->make()->toArray();

        $updatedClientGovernorate = $this->clientGovernorateRepo->update($fakeClientGovernorate, $clientGovernorate->id);

        $this->assertModelData($fakeClientGovernorate, $updatedClientGovernorate->toArray());
        $dbClientGovernorate = $this->clientGovernorateRepo->find($clientGovernorate->id);
        $this->assertModelData($fakeClientGovernorate, $dbClientGovernorate->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_client_governorate()
    {
        $clientGovernorate = factory(ClientGovernorate::class)->create();

        $resp = $this->clientGovernorateRepo->delete($clientGovernorate->id);

        $this->assertTrue($resp);
        $this->assertNull(ClientGovernorate::find($clientGovernorate->id), 'ClientGovernorate should not exist in DB');
    }
}
