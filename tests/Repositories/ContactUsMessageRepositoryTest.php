<?php namespace Tests\Repositories;

use App\Models\ContactUsMessage;
use App\Repositories\ContactUsMessageRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ContactUsMessageRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ContactUsMessageRepository
     */
    protected $contactUsMessageRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->contactUsMessageRepo = \App::make(ContactUsMessageRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_contact_us_message()
    {
        $contactUsMessage = factory(ContactUsMessage::class)->make()->toArray();

        $createdContactUsMessage = $this->contactUsMessageRepo->create($contactUsMessage);

        $createdContactUsMessage = $createdContactUsMessage->toArray();
        $this->assertArrayHasKey('id', $createdContactUsMessage);
        $this->assertNotNull($createdContactUsMessage['id'], 'Created ContactUsMessage must have id specified');
        $this->assertNotNull(ContactUsMessage::find($createdContactUsMessage['id']), 'ContactUsMessage with given id must be in DB');
        $this->assertModelData($contactUsMessage, $createdContactUsMessage);
    }

    /**
     * @test read
     */
    public function test_read_contact_us_message()
    {
        $contactUsMessage = factory(ContactUsMessage::class)->create();

        $dbContactUsMessage = $this->contactUsMessageRepo->find($contactUsMessage->id);

        $dbContactUsMessage = $dbContactUsMessage->toArray();
        $this->assertModelData($contactUsMessage->toArray(), $dbContactUsMessage);
    }

    /**
     * @test update
     */
    public function test_update_contact_us_message()
    {
        $contactUsMessage = factory(ContactUsMessage::class)->create();
        $fakeContactUsMessage = factory(ContactUsMessage::class)->make()->toArray();

        $updatedContactUsMessage = $this->contactUsMessageRepo->update($fakeContactUsMessage, $contactUsMessage->id);

        $this->assertModelData($fakeContactUsMessage, $updatedContactUsMessage->toArray());
        $dbContactUsMessage = $this->contactUsMessageRepo->find($contactUsMessage->id);
        $this->assertModelData($fakeContactUsMessage, $dbContactUsMessage->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_contact_us_message()
    {
        $contactUsMessage = factory(ContactUsMessage::class)->create();

        $resp = $this->contactUsMessageRepo->delete($contactUsMessage->id);

        $this->assertTrue($resp);
        $this->assertNull(ContactUsMessage::find($contactUsMessage->id), 'ContactUsMessage should not exist in DB');
    }
}
