<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateGovernorateAPIRequest;
use App\Http\Requests\API\UpdateGovernorateAPIRequest;
use App\Models\Governorate;
use App\Repositories\GovernorateRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class GovernorateController
 * @package App\Http\Controllers\API
 */

class GovernorateAPIController extends AppBaseController
{
    /** @var  GovernorateRepository */
    private $governorateRepository;

    public function __construct(GovernorateRepository $governorateRepo)
    {
        $this->governorateRepository = $governorateRepo;
    }

    /**
     * Display a listing of the Governorate.
     * GET|HEAD /governorates
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $governorates = $this->governorateRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($governorates->toArray(), 'Governorates retrieved successfully');
    }

    /**
     * Store a newly created Governorate in storage.
     * POST /governorates
     *
     * @param CreateGovernorateAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateGovernorateAPIRequest $request)
    {
        $input = $request->all();

        $governorate = $this->governorateRepository->create($input);

        return $this->sendResponse($governorate->toArray(), 'Governorate saved successfully');
    }

    /**
     * Display the specified Governorate.
     * GET|HEAD /governorates/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Governorate $governorate */
        $governorate = $this->governorateRepository->find($id);

        if (empty($governorate)) {
            return $this->sendError('Governorate not found');
        }

        return $this->sendResponse($governorate->toArray(), 'Governorate retrieved successfully');
    }

    /**
     * Update the specified Governorate in storage.
     * PUT/PATCH /governorates/{id}
     *
     * @param int $id
     * @param UpdateGovernorateAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGovernorateAPIRequest $request)
    {
        $input = $request->all();

        /** @var Governorate $governorate */
        $governorate = $this->governorateRepository->find($id);

        if (empty($governorate)) {
            return $this->sendError('Governorate not found');
        }

        $governorate = $this->governorateRepository->update($input, $id);

        return $this->sendResponse($governorate->toArray(), 'Governorate updated successfully');
    }

    /**
     * Remove the specified Governorate from storage.
     * DELETE /governorates/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Governorate $governorate */
        $governorate = $this->governorateRepository->find($id);

        if (empty($governorate)) {
            return $this->sendError('Governorate not found');
        }

        $governorate->delete();

        return $this->sendSuccess('Governorate deleted successfully');
    }
}
