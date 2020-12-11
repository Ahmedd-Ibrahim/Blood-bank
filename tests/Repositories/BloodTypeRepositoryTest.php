<?php namespace Tests\Repositories;

use App\Models\BloodType;
use App\Repositories\BloodTypeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class BloodTypeRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var BloodTypeRepository
     */
    protected $bloodTypeRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->bloodTypeRepo = \App::make(BloodTypeRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_blood_type()
    {
        $bloodType = factory(BloodType::class)->make()->toArray();

        $createdBloodType = $this->bloodTypeRepo->create($bloodType);

        $createdBloodType = $createdBloodType->toArray();
        $this->assertArrayHasKey('id', $createdBloodType);
        $this->assertNotNull($createdBloodType['id'], 'Created BloodType must have id specified');
        $this->assertNotNull(BloodType::find($createdBloodType['id']), 'BloodType with given id must be in DB');
        $this->assertModelData($bloodType, $createdBloodType);
    }

    /**
     * @test read
     */
    public function test_read_blood_type()
    {
        $bloodType = factory(BloodType::class)->create();

        $dbBloodType = $this->bloodTypeRepo->find($bloodType->id);

        $dbBloodType = $dbBloodType->toArray();
        $this->assertModelData($bloodType->toArray(), $dbBloodType);
    }

    /**
     * @test update
     */
    public function test_update_blood_type()
    {
        $bloodType = factory(BloodType::class)->create();
        $fakeBloodType = factory(BloodType::class)->make()->toArray();

        $updatedBloodType = $this->bloodTypeRepo->update($fakeBloodType, $bloodType->id);

        $this->assertModelData($fakeBloodType, $updatedBloodType->toArray());
        $dbBloodType = $this->bloodTypeRepo->find($bloodType->id);
        $this->assertModelData($fakeBloodType, $dbBloodType->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_blood_type()
    {
        $bloodType = factory(BloodType::class)->create();

        $resp = $this->bloodTypeRepo->delete($bloodType->id);

        $this->assertTrue($resp);
        $this->assertNull(BloodType::find($bloodType->id), 'BloodType should not exist in DB');
    }
}
