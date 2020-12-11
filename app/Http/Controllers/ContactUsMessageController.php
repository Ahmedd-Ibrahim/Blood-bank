<?php

namespace App\Http\Controllers;

use App\DataTables\ContactUsMessageDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateContactUsMessageRequest;
use App\Http\Requests\UpdateContactUsMessageRequest;
use App\Repositories\ContactUsMessageRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ContactUsMessageController extends AppBaseController
{
    /** @var  ContactUsMessageRepository */
    private $contactUsMessageRepository;

    public function __construct(ContactUsMessageRepository $contactUsMessageRepo)
    {
        $this->contactUsMessageRepository = $contactUsMessageRepo;
    }

    /**
     * Display a listing of the ContactUsMessage.
     *
     * @param ContactUsMessageDataTable $contactUsMessageDataTable
     * @return Response
     */
    public function index(ContactUsMessageDataTable $contactUsMessageDataTable)
    {
        return $contactUsMessageDataTable->render('contact_us_messages.index');
    }

    /**
     * Show the form for creating a new ContactUsMessage.
     *
     * @return Response
     */
    public function create()
    {
        return view('contact_us_messages.create');
    }

    /**
     * Store a newly created ContactUsMessage in storage.
     *
     * @param CreateContactUsMessageRequest $request
     *
     * @return Response
     */
    public function store(CreateContactUsMessageRequest $request)
    {
        $input = $request->all();

        $contactUsMessage = $this->contactUsMessageRepository->create($input);

        Flash::success('Contact Us Message saved successfully.');

        return redirect(route('contactUsMessages.index'));
    }

    /**
     * Display the specified ContactUsMessage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $contactUsMessage = $this->contactUsMessageRepository->find($id);

        if (empty($contactUsMessage)) {
            Flash::error('Contact Us Message not found');

            return redirect(route('contactUsMessages.index'));
        }

        return view('contact_us_messages.show')->with('contactUsMessage', $contactUsMessage);
    }

    /**
     * Show the form for editing the specified ContactUsMessage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $contactUsMessage = $this->contactUsMessageRepository->find($id);

        if (empty($contactUsMessage)) {
            Flash::error('Contact Us Message not found');

            return redirect(route('contactUsMessages.index'));
        }

        return view('contact_us_messages.edit')->with('contactUsMessage', $contactUsMessage);
    }

    /**
     * Update the specified ContactUsMessage in storage.
     *
     * @param  int              $id
     * @param UpdateContactUsMessageRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateContactUsMessageRequest $request)
    {
        $contactUsMessage = $this->contactUsMessageRepository->find($id);

        if (empty($contactUsMessage)) {
            Flash::error('Contact Us Message not found');

            return redirect(route('contactUsMessages.index'));
        }

        $contactUsMessage = $this->contactUsMessageRepository->update($request->all(), $id);

        Flash::success('Contact Us Message updated successfully.');

        return redirect(route('contactUsMessages.index'));
    }

    /**
     * Remove the specified ContactUsMessage from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $contactUsMessage = $this->contactUsMessageRepository->find($id);

        if (empty($contactUsMessage)) {
            Flash::error('Contact Us Message not found');

            return redirect(route('contactUsMessages.index'));
        }

        $this->contactUsMessageRepository->delete($id);

        Flash::success('Contact Us Message deleted successfully.');

        return redirect(route('contactUsMessages.index'));
    }
}
