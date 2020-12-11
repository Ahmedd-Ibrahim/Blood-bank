<?php namespace Tests\Repositories;

use App\Models\Governorate;
use App\Repositories\GovernorateRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class GovernorateRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var GovernorateRepository
     */
    protected $governorateRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->governorateRepo = \App::make(GovernorateRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_governorate()
    {
        $governorate = factory(Governorate::class)->make()->toArray();

        $createdGovernorate = $this->governorateRepo->create($governorate);

        $createdGovernorate = $createdGovernorate->toArray();
        $this->assertArrayHasKey('id', $createdGovernorate);
        $this->assertNotNull($createdGovernorate['id'], 'Created Governorate must have id specified');
        $this->assertNotNull(Governorate::find($createdGovernorate['id']), 'Governorate with given id must be in DB');
        $this->assertModelData($governorate, $createdGovernorate);
    }

    /**
     * @test read
     */
    public function test_read_governorate()
    {
        $governorate = factory(Governorate::class)->create();

        $dbGovernorate = $this->governorateRepo->find($governorate->id);

        $dbGovernorate = $dbGovernorate->toArray();
        $this->assertModelData($governorate->toArray(), $dbGovernorate);
    }

    /**
     * @test update
     */
    public function test_update_governorate()
    {
        $governorate = factory(Governorate::class)->create();
        $fakeGovernorate = factory(Governorate::class)->make()->toArray();

        $updatedGovernorate = $this->governorateRepo->update($fakeGovernorate, $governorate->id);

        $this->assertModelData($fakeGovernorate, $updatedGovernorate->toArray());
        $dbGovernorate = $this->governorateRepo->find($governorate->id);
        $this->assertModelData($fakeGovernorate, $dbGovernorate->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_governorate()
    {
        $governorate = factory(Governorate::class)->create();

        $resp = $this->governorateRepo->delete($governorate->id);

        $this->assertTrue($resp);
        $this->assertNull(Governorate::find($governorate->id), 'Governorate should not exist in DB');
    }
}
