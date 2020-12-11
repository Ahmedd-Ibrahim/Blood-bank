<?php

namespace App\Http\Controllers;

use App\DataTables\GovernorateDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateGovernorateRequest;
use App\Http\Requests\UpdateGovernorateRequest;
use App\Repositories\GovernorateRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class GovernorateController extends AppBaseController
{
    /** @var  GovernorateRepository */
    private $governorateRepository;

    public function __construct(GovernorateRepository $governorateRepo)
    {
        $this->governorateRepository = $governorateRepo;
    }

    /**
     * Display a listing of the Governorate.
     *
     * @param GovernorateDataTable $governorateDataTable
     * @return Response
     */
    public function index(GovernorateDataTable $governorateDataTable)
    {
        return $governorateDataTable->render('governorates.index');
    }

    /**
     * Show the form for creating a new Governorate.
     *
     * @return Response
     */
    public function create()
    {
        return view('governorates.create');
    }

    /**
     * Store a newly created Governorate in storage.
     *
     * @param CreateGovernorateRequest $request
     *
     * @return Response
     */
    public function store(CreateGovernorateRequest $request)
    {
        $input = $request->all();

        $governorate = $this->governorateRepository->create($input);

        Flash::success('Governorate saved successfully.');

        return redirect(route('governorates.index'));
    }

    /**
     * Display the specified Governorate.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $governorate = $this->governorateRepository->find($id);

        if (empty($governorate)) {
            Flash::error('Governorate not found');

            return redirect(route('governorates.index'));
        }

        return view('governorates.show')->with('governorate', $governorate);
    }

    /**
     * Show the form for editing the specified Governorate.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $governorate = $this->governorateRepository->find($id);

        if (empty($governorate)) {
            Flash::error('Governorate not found');

            return redirect(route('governorates.index'));
        }

        return view('governorates.edit')->with('governorate', $governorate);
    }

    /**
     * Update the specified Governorate in storage.
     *
     * @param  int              $id
     * @param UpdateGovernorateRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGovernorateRequest $request)
    {
        $governorate = $this->governorateRepository->find($id);

        if (empty($governorate)) {
            Flash::error('Governorate not found');

            return redirect(route('governorates.index'));
        }

        $governorate = $this->governorateRepository->update($request->all(), $id);

        Flash::success('Governorate updated successfully.');

        return redirect(route('governorates.index'));
    }

    /**
     * Remove the specified Governorate from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $governorate = $this->governorateRepository->find($id);

        if (empty($governorate)) {
            Flash::error('Governorate not found');

            return redirect(route('governorates.index'));
        }

        $this->governorateRepository->delete($id);

        Flash::success('Governorate deleted successfully.');

        return redirect(route('governorates.index'));
    }
}
