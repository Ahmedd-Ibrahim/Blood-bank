<?php namespace Tests\Repositories;

use App\Models\DonationOrder;
use App\Repositories\DonationOrderRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class DonationOrderRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var DonationOrderRepository
     */
    protected $donationOrderRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->donationOrderRepo = \App::make(DonationOrderRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_donation_order()
    {
        $donationOrder = factory(DonationOrder::class)->make()->toArray();

        $createdDonationOrder = $this->donationOrderRepo->create($donationOrder);

        $createdDonationOrder = $createdDonationOrder->toArray();
        $this->assertArrayHasKey('id', $createdDonationOrder);
        $this->assertNotNull($createdDonationOrder['id'], 'Created DonationOrder must have id specified');
        $this->assertNotNull(DonationOrder::find($createdDonationOrder['id']), 'DonationOrder with given id must be in DB');
        $this->assertModelData($donationOrder, $createdDonationOrder);
    }

    /**
     * @test read
     */
    public function test_read_donation_order()
    {
        $donationOrder = factory(DonationOrder::class)->create();

        $dbDonationOrder = $this->donationOrderRepo->find($donationOrder->id);

        $dbDonationOrder = $dbDonationOrder->toArray();
        $this->assertModelData($donationOrder->toArray(), $dbDonationOrder);
    }

    /**
     * @test update
     */
    public function test_update_donation_order()
    {
        $donationOrder = factory(DonationOrder::class)->create();
        $fakeDonationOrder = factory(DonationOrder::class)->make()->toArray();

        $updatedDonationOrder = $this->donationOrderRepo->update($fakeDonationOrder, $donationOrder->id);

        $this->assertModelData($fakeDonationOrder, $updatedDonationOrder->toArray());
        $dbDonationOrder = $this->donationOrderRepo->find($donationOrder->id);
        $this->assertModelData($fakeDonationOrder, $dbDonationOrder->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_donation_order()
    {
        $donationOrder = factory(DonationOrder::class)->create();

        $resp = $this->donationOrderRepo->delete($donationOrder->id);

        $this->assertTrue($resp);
        $this->assertNull(DonationOrder::find($donationOrder->id), 'DonationOrder should not exist in DB');
    }
}
