<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\ContactUsMessage;

class ContactUsMessageApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_contact_us_message()
    {
        $contactUsMessage = factory(ContactUsMessage::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/contact_us_messages', $contactUsMessage
        );

        $this->assertApiResponse($contactUsMessage);
    }

    /**
     * @test
     */
    public function test_read_contact_us_message()
    {
        $contactUsMessage = factory(ContactUsMessage::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/contact_us_messages/'.$contactUsMessage->id
        );

        $this->assertApiResponse($contactUsMessage->toArray());
    }

    /**
     * @test
     */
    public function test_update_contact_us_message()
    {
        $contactUsMessage = factory(ContactUsMessage::class)->create();
        $editedContactUsMessage = factory(ContactUsMessage::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/contact_us_messages/'.$contactUsMessage->id,
            $editedContactUsMessage
        );

        $this->assertApiResponse($editedContactUsMessage);
    }

    /**
     * @test
     */
    public function test_delete_contact_us_message()
    {
        $contactUsMessage = factory(ContactUsMessage::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/contact_us_messages/'.$contactUsMessage->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/contact_us_messages/'.$contactUsMessage->id
        );

        $this->response->assertStatus(404);
    }
}
