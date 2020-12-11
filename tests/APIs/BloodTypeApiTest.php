<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\BloodType;

class BloodTypeApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_blood_type()
    {
        $bloodType = factory(BloodType::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/blood_types', $bloodType
        );

        $this->assertApiResponse($bloodType);
    }

    /**
     * @test
     */
    public function test_read_blood_type()
    {
        $bloodType = factory(BloodType::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/blood_types/'.$bloodType->id
        );

        $this->assertApiResponse($bloodType->toArray());
    }

    /**
     * @test
     */
    public function test_update_blood_type()
    {
        $bloodType = factory(BloodType::class)->create();
        $editedBloodType = factory(BloodType::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/blood_types/'.$bloodType->id,
            $editedBloodType
        );

        $this->assertApiResponse($editedBloodType);
    }

    /**
     * @test
     */
    public function test_delete_blood_type()
    {
        $bloodType = factory(BloodType::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/blood_types/'.$bloodType->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/blood_types/'.$bloodType->id
        );

        $this->response->assertStatus(404);
    }
}
