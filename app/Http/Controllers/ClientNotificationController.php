<?php

namespace App\Http\Controllers;

use App\DataTables\ClientNotificationDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateClientNotificationRequest;
use App\Http\Requests\UpdateClientNotificationRequest;
use App\Repositories\ClientNotificationRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ClientNotificationController extends AppBaseController
{
    /** @var  ClientNotificationRepository */
    private $clientNotificationRepository;

    public function __construct(ClientNotificationRepository $clientNotificationRepo)
    {
        $this->clientNotificationRepository = $clientNotificationRepo;
    }

    /**
     * Display a listing of the ClientNotification.
     *
     * @param ClientNotificationDataTable $clientNotificationDataTable
     * @return Response
     */
    public function index(ClientNotificationDataTable $clientNotificationDataTable)
    {
        return $clientNotificationDataTable->render('client_notifications.index');
    }

    /**
     * Show the form for creating a new ClientNotification.
     *
     * @return Response
     */
    public function create()
    {
        return view('client_notifications.create');
    }

    /**
     * Store a newly created ClientNotification in storage.
     *
     * @param CreateClientNotificationRequest $request
     *
     * @return Response
     */
    public function store(CreateClientNotificationRequest $request)
    {
        $input = $request->all();

        $clientNotification = $this->clientNotificationRepository->create($input);

        Flash::success('Client Notification saved successfully.');

        return redirect(route('clientNotifications.index'));
    }

    /**
     * Display the specified ClientNotification.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $clientNotification = $this->clientNotificationRepository->find($id);

        if (empty($clientNotification)) {
            Flash::error('Client Notification not found');

            return redirect(route('clientNotifications.index'));
        }

        return view('client_notifications.show')->with('clientNotification', $clientNotification);
    }

    /**
     * Show the form for editing the specified ClientNotification.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $clientNotification = $this->clientNotificationRepository->find($id);

        if (empty($clientNotification)) {
            Flash::error('Client Notification not found');

            return redirect(route('clientNotifications.index'));
        }

        return view('client_notifications.edit')->with('clientNotification', $clientNotification);
    }

    /**
     * Update the specified ClientNotification in storage.
     *
     * @param  int              $id
     * @param UpdateClientNotificationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateClientNotificationRequest $request)
    {
        $clientNotification = $this->clientNotificationRepository->find($id);

        if (empty($clientNotification)) {
            Flash::error('Client Notification not found');

            return redirect(route('clientNotifications.index'));
        }

        $clientNotification = $this->clientNotificationRepository->update($request->all(), $id);

        Flash::success('Client Notification updated successfully.');

        return redirect(route('clientNotifications.index'));
    }

    /**
     * Remove the specified ClientNotification from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $clientNotification = $this->clientNotificationRepository->find($id);

        if (empty($clientNotification)) {
            Flash::error('Client Notification not found');

            return redirect(route('clientNotifications.index'));
        }

        $this->clientNotificationRepository->delete($id);

        Flash::success('Client Notification deleted successfully.');

        return redirect(route('clientNotifications.index'));
    }
}
