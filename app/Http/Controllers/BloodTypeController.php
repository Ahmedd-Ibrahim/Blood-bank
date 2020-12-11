<?php

namespace App\Http\Controllers;

use App\DataTables\BloodTypeDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateBloodTypeRequest;
use App\Http\Requests\UpdateBloodTypeRequest;
use App\Repositories\BloodTypeRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class BloodTypeController extends AppBaseController
{
    /** @var  BloodTypeRepository */
    private $bloodTypeRepository;

    public function __construct(BloodTypeRepository $bloodTypeRepo)
    {
        $this->bloodTypeRepository = $bloodTypeRepo;
    }

    /**
     * Display a listing of the BloodType.
     *
     * @param BloodTypeDataTable $bloodTypeDataTable
     * @return Response
     */
    public function index(BloodTypeDataTable $bloodTypeDataTable)
    {
        return $bloodTypeDataTable->render('blood_types.index');
    }

    /**
     * Show the form for creating a new BloodType.
     *
     * @return Response
     */
    public function create()
    {
        return view('blood_types.create');
    }

    /**
     * Store a newly created BloodType in storage.
     *
     * @param CreateBloodTypeRequest $request
     *
     * @return Response
     */
    public function store(CreateBloodTypeRequest $request)
    {
        $input = $request->all();

        $bloodType = $this->bloodTypeRepository->create($input);

        Flash::success('Blood Type saved successfully.');

        return redirect(route('bloodTypes.index'));
    }

    /**
     * Display the specified BloodType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $bloodType = $this->bloodTypeRepository->find($id);

        if (empty($bloodType)) {
            Flash::error('Blood Type not found');

            return redirect(route('bloodTypes.index'));
        }

        return view('blood_types.show')->with('bloodType', $bloodType);
    }

    /**
     * Show the form for editing the specified BloodType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $bloodType = $this->bloodTypeRepository->find($id);

        if (empty($bloodType)) {
            Flash::error('Blood Type not found');

            return redirect(route('bloodTypes.index'));
        }

        return view('blood_types.edit')->with('bloodType', $bloodType);
    }

    /**
     * Update the specified BloodType in storage.
     *
     * @param  int              $id
     * @param UpdateBloodTypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBloodTypeRequest $request)
    {
        $bloodType = $this->bloodTypeRepository->find($id);

        if (empty($bloodType)) {
            Flash::error('Blood Type not found');

            return redirect(route('bloodTypes.index'));
        }

        $bloodType = $this->bloodTypeRepository->update($request->all(), $id);

        Flash::success('Blood Type updated successfully.');

        return redirect(route('bloodTypes.index'));
    }

    /**
     * Remove the specified BloodType from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $bloodType = $this->bloodTypeRepository->find($id);

        if (empty($bloodType)) {
            Flash::error('Blood Type not found');

            return redirect(route('bloodTypes.index'));
        }

        $this->bloodTypeRepository->delete($id);

        Flash::success('Blood Type deleted successfully.');

        return redirect(route('bloodTypes.index'));
    }
}
