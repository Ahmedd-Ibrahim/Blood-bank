<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\DonationOrder;

class DonationOrderApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_donation_order()
    {
        $donationOrder = factory(DonationOrder::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/donation_orders', $donationOrder
        );

        $this->assertApiResponse($donationOrder);
    }

    /**
     * @test
     */
    public function test_read_donation_order()
    {
        $donationOrder = factory(DonationOrder::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/donation_orders/'.$donationOrder->id
        );

        $this->assertApiResponse($donationOrder->toArray());
    }

    /**
     * @test
     */
    public function test_update_donation_order()
    {
        $donationOrder = factory(DonationOrder::class)->create();
        $editedDonationOrder = factory(DonationOrder::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/donation_orders/'.$donationOrder->id,
            $editedDonationOrder
        );

        $this->assertApiResponse($editedDonationOrder);
    }

    /**
     * @test
     */
    public function test_delete_donation_order()
    {
        $donationOrder = factory(DonationOrder::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/donation_orders/'.$donationOrder->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/donation_orders/'.$donationOrder->id
        );

        $this->response->assertStatus(404);
    }
}
