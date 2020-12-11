<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateClientGovernorateAPIRequest;
use App\Http\Requests\API\UpdateClientGovernorateAPIRequest;
use App\Models\ClientGovernorate;
use App\Repositories\ClientGovernorateRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ClientGovernorateController
 * @package App\Http\Controllers\API
 */

class ClientGovernorateAPIController extends AppBaseController
{
    /** @var  ClientGovernorateRepository */
    private $clientGovernorateRepository;

    public function __construct(ClientGovernorateRepository $clientGovernorateRepo)
    {
        $this->clientGovernorateRepository = $clientGovernorateRepo;
    }

    /**
     * Display a listing of the ClientGovernorate.
     * GET|HEAD /clientGovernorates
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $clientGovernorates = $this->clientGovernorateRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($clientGovernorates->toArray(), 'Client Governorates retrieved successfully');
    }

    /**
     * Store a newly created ClientGovernorate in storage.
     * POST /clientGovernorates
     *
     * @param CreateClientGovernorateAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateClientGovernorateAPIRequest $request)
    {
        $input = $request->all();

        $clientGovernorate = $this->clientGovernorateRepository->create($input);

        return $this->sendResponse($clientGovernorate->toArray(), 'Client Governorate saved successfully');
    }

    /**
     * Display the specified ClientGovernorate.
     * GET|HEAD /clientGovernorates/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ClientGovernorate $clientGovernorate */
        $clientGovernorate = $this->clientGovernorateRepository->find($id);

        if (empty($clientGovernorate)) {
            return $this->sendError('Client Governorate not found');
        }

        return $this->sendResponse($clientGovernorate->toArray(), 'Client Governorate retrieved successfully');
    }

    /**
     * Update the specified ClientGovernorate in storage.
     * PUT/PATCH /clientGovernorates/{id}
     *
     * @param int $id
     * @param UpdateClientGovernorateAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateClientGovernorateAPIRequest $request)
    {
        $input = $request->all();

        /** @var ClientGovernorate $clientGovernorate */
        $clientGovernorate = $this->clientGovernorateRepository->find($id);

        if (empty($clientGovernorate)) {
            return $this->sendError('Client Governorate not found');
        }

        $clientGovernorate = $this->clientGovernorateRepository->update($input, $id);

        return $this->sendResponse($clientGovernorate->toArray(), 'ClientGovernorate updated successfully');
    }

    /**
     * Remove the specified ClientGovernorate from storage.
     * DELETE /clientGovernorates/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ClientGovernorate $clientGovernorate */
        $clientGovernorate = $this->clientGovernorateRepository->find($id);

        if (empty($clientGovernorate)) {
            return $this->sendError('Client Governorate not found');
        }

        $clientGovernorate->delete();

        return $this->sendSuccess('Client Governorate deleted successfully');
    }
}
