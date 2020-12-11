<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateContactUsMessageAPIRequest;
use App\Http\Requests\API\UpdateContactUsMessageAPIRequest;
use App\Models\ContactUsMessage;
use App\Repositories\ContactUsMessageRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ContactUsMessageController
 * @package App\Http\Controllers\API
 */

class ContactUsMessageAPIController extends AppBaseController
{
    /** @var  ContactUsMessageRepository */
    private $contactUsMessageRepository;

    public function __construct(ContactUsMessageRepository $contactUsMessageRepo)
    {
        $this->contactUsMessageRepository = $contactUsMessageRepo;
    }

    /**
     * Display a listing of the ContactUsMessage.
     * GET|HEAD /contactUsMessages
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $contactUsMessages = $this->contactUsMessageRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($contactUsMessages->toArray(), 'Contact Us Messages retrieved successfully');
    }

    /**
     * Store a newly created ContactUsMessage in storage.
     * POST /contactUsMessages
     *
     * @param CreateContactUsMessageAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateContactUsMessageAPIRequest $request)
    {
        $input = $request->all();

        $contactUsMessage = $this->contactUsMessageRepository->create($input);

        return $this->sendResponse($contactUsMessage->toArray(), 'Contact Us Message saved successfully');
    }

    /**
     * Display the specified ContactUsMessage.
     * GET|HEAD /contactUsMessages/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ContactUsMessage $contactUsMessage */
        $contactUsMessage = $this->contactUsMessageRepository->find($id);

        if (empty($contactUsMessage)) {
            return $this->sendError('Contact Us Message not found');
        }

        return $this->sendResponse($contactUsMessage->toArray(), 'Contact Us Message retrieved successfully');
    }

    /**
     * Update the specified ContactUsMessage in storage.
     * PUT/PATCH /contactUsMessages/{id}
     *
     * @param int $id
     * @param UpdateContactUsMessageAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateContactUsMessageAPIRequest $request)
    {
        $input = $request->all();

        /** @var ContactUsMessage $contactUsMessage */
        $contactUsMessage = $this->contactUsMessageRepository->find($id);

        if (empty($contactUsMessage)) {
            return $this->sendError('Contact Us Message not found');
        }

        $contactUsMessage = $this->contactUsMessageRepository->update($input, $id);

        return $this->sendResponse($contactUsMessage->toArray(), 'ContactUsMessage updated successfully');
    }

    /**
     * Remove the specified ContactUsMessage from storage.
     * DELETE /contactUsMessages/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ContactUsMessage $contactUsMessage */
        $contactUsMessage = $this->contactUsMessageRepository->find($id);

        if (empty($contactUsMessage)) {
            return $this->sendError('Contact Us Message not found');
        }

        $contactUsMessage->delete();

        return $this->sendSuccess('Contact Us Message deleted successfully');
    }
}
