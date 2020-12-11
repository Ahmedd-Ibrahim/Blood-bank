<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBloodTypeClientAPIRequest;
use App\Http\Requests\API\UpdateBloodTypeClientAPIRequest;
use App\Models\BloodTypeClient;
use App\Repositories\BloodTypeClientRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class BloodTypeClientController
 * @package App\Http\Controllers\API
 */

class BloodTypeClientAPIController extends AppBaseController
{
    /** @var  BloodTypeClientRepository */
    private $bloodTypeClientRepository;

    public function __construct(BloodTypeClientRepository $bloodTypeClientRepo)
    {
        $this->bloodTypeClientRepository = $bloodTypeClientRepo;
    }

    /**
     * Display a listing of the BloodTypeClient.
     * GET|HEAD /bloodTypeClients
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $bloodTypeClients = $this->bloodTypeClientRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($bloodTypeClients->toArray(), 'Blood Type Clients retrieved successfully');
    }

    /**
     * Store a newly created BloodTypeClient in storage.
     * POST /bloodTypeClients
     *
     * @param CreateBloodTypeClientAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBloodTypeClientAPIRequest $request)
    {
        $input = $request->all();

        $bloodTypeClient = $this->bloodTypeClientRepository->create($input);

        return $this->sendResponse($bloodTypeClient->toArray(), 'Blood Type Client saved successfully');
    }

    /**
     * Display the specified BloodTypeClient.
     * GET|HEAD /bloodTypeClients/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var BloodTypeClient $bloodTypeClient */
        $bloodTypeClient = $this->bloodTypeClientRepository->find($id);

        if (empty($bloodTypeClient)) {
            return $this->sendError('Blood Type Client not found');
        }

        return $this->sendResponse($bloodTypeClient->toArray(), 'Blood Type Client retrieved successfully');
    }

    /**
     * Update the specified BloodTypeClient in storage.
     * PUT/PATCH /bloodTypeClients/{id}
     *
     * @param int $id
     * @param UpdateBloodTypeClientAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBloodTypeClientAPIRequest $request)
    {
        $input = $request->all();

        /** @var BloodTypeClient $bloodTypeClient */
        $bloodTypeClient = $this->bloodTypeClientRepository->find($id);

        if (empty($bloodTypeClient)) {
            return $this->sendError('Blood Type Client not found');
        }

        $bloodTypeClient = $this->bloodTypeClientRepository->update($input, $id);

        return $this->sendResponse($bloodTypeClient->toArray(), 'BloodTypeClient updated successfully');
    }

    /**
     * Remove the specified BloodTypeClient from storage.
     * DELETE /bloodTypeClients/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var BloodTypeClient $bloodTypeClient */
        $bloodTypeClient = $this->bloodTypeClientRepository->find($id);

        if (empty($bloodTypeClient)) {
            return $this->sendError('Blood Type Client not found');
        }

        $bloodTypeClient->delete();

        return $this->sendSuccess('Blood Type Client deleted successfully');
    }
}
