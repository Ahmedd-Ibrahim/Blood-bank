<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateClientNotificationAPIRequest;
use App\Http\Requests\API\UpdateClientNotificationAPIRequest;
use App\Models\ClientNotification;
use App\Repositories\ClientNotificationRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ClientNotificationController
 * @package App\Http\Controllers\API
 */

class ClientNotificationAPIController extends AppBaseController
{
    /** @var  ClientNotificationRepository */
    private $clientNotificationRepository;

    public function __construct(ClientNotificationRepository $clientNotificationRepo)
    {
        $this->clientNotificationRepository = $clientNotificationRepo;
    }

    /**
     * Display a listing of the ClientNotification.
     * GET|HEAD /clientNotifications
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $clientNotifications = $this->clientNotificationRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($clientNotifications->toArray(), 'Client Notifications retrieved successfully');
    }

    /**
     * Store a newly created ClientNotification in storage.
     * POST /clientNotifications
     *
     * @param CreateClientNotificationAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateClientNotificationAPIRequest $request)
    {
        $input = $request->all();

        $clientNotification = $this->clientNotificationRepository->create($input);

        return $this->sendResponse($clientNotification->toArray(), 'Client Notification saved successfully');
    }

    /**
     * Display the specified ClientNotification.
     * GET|HEAD /clientNotifications/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ClientNotification $clientNotification */
        $clientNotification = $this->clientNotificationRepository->find($id);

        if (empty($clientNotification)) {
            return $this->sendError('Client Notification not found');
        }

        return $this->sendResponse($clientNotification->toArray(), 'Client Notification retrieved successfully');
    }

    /**
     * Update the specified ClientNotification in storage.
     * PUT/PATCH /clientNotifications/{id}
     *
     * @param int $id
     * @param UpdateClientNotificationAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateClientNotificationAPIRequest $request)
    {
        $input = $request->all();

        /** @var ClientNotification $clientNotification */
        $clientNotification = $this->clientNotificationRepository->find($id);

        if (empty($clientNotification)) {
            return $this->sendError('Client Notification not found');
        }

        $clientNotification = $this->clientNotificationRepository->update($input, $id);

        return $this->sendResponse($clientNotification->toArray(), 'ClientNotification updated successfully');
    }

    /**
     * Remove the specified ClientNotification from storage.
     * DELETE /clientNotifications/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ClientNotification $clientNotification */
        $clientNotification = $this->clientNotificationRepository->find($id);

        if (empty($clientNotification)) {
            return $this->sendError('Client Notification not found');
        }

        $clientNotification->delete();

        return $this->sendSuccess('Client Notification deleted successfully');
    }
}
