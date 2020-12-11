<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBloodTypeAPIRequest;
use App\Http\Requests\API\UpdateBloodTypeAPIRequest;
use App\Models\BloodType;
use App\Repositories\BloodTypeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class BloodTypeController
 * @package App\Http\Controllers\API
 */

class BloodTypeAPIController extends AppBaseController
{
    /** @var  BloodTypeRepository */
    private $bloodTypeRepository;

    public function __construct(BloodTypeRepository $bloodTypeRepo)
    {
        $this->bloodTypeRepository = $bloodTypeRepo;
    }

    /**
     * Display a listing of the BloodType.
     * GET|HEAD /bloodTypes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $bloodTypes = $this->bloodTypeRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($bloodTypes->toArray(), 'Blood Types retrieved successfully');
    }

    /**
     * Store a newly created BloodType in storage.
     * POST /bloodTypes
     *
     * @param CreateBloodTypeAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBloodTypeAPIRequest $request)
    {
        $input = $request->all();

        $bloodType = $this->bloodTypeRepository->create($input);

        return $this->sendResponse($bloodType->toArray(), 'Blood Type saved successfully');
    }

    /**
     * Display the specified BloodType.
     * GET|HEAD /bloodTypes/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var BloodType $bloodType */
        $bloodType = $this->bloodTypeRepository->find($id);

        if (empty($bloodType)) {
            return $this->sendError('Blood Type not found');
        }

        return $this->sendResponse($bloodType->toArray(), 'Blood Type retrieved successfully');
    }

    /**
     * Update the specified BloodType in storage.
     * PUT/PATCH /bloodTypes/{id}
     *
     * @param int $id
     * @param UpdateBloodTypeAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBloodTypeAPIRequest $request)
    {
        $input = $request->all();

        /** @var BloodType $bloodType */
        $bloodType = $this->bloodTypeRepository->find($id);

        if (empty($bloodType)) {
            return $this->sendError('Blood Type not found');
        }

        $bloodType = $this->bloodTypeRepository->update($input, $id);

        return $this->sendResponse($bloodType->toArray(), 'BloodType updated successfully');
    }

    /**
     * Remove the specified BloodType from storage.
     * DELETE /bloodTypes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var BloodType $bloodType */
        $bloodType = $this->bloodTypeRepository->find($id);

        if (empty($bloodType)) {
            return $this->sendError('Blood Type not found');
        }

        $bloodType->delete();

        return $this->sendSuccess('Blood Type deleted successfully');
    }
}
