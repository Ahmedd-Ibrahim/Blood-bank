<?php

namespace App\Http\Controllers;

use App\DataTables\ClientGovernorateDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateClientGovernorateRequest;
use App\Http\Requests\UpdateClientGovernorateRequest;
use App\Repositories\ClientGovernorateRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ClientGovernorateController extends AppBaseController
{
    /** @var  ClientGovernorateRepository */
    private $clientGovernorateRepository;

    public function __construct(ClientGovernorateRepository $clientGovernorateRepo)
    {
        $this->clientGovernorateRepository = $clientGovernorateRepo;
    }

    /**
     * Display a listing of the ClientGovernorate.
     *
     * @param ClientGovernorateDataTable $clientGovernorateDataTable
     * @return Response
     */
    public function index(ClientGovernorateDataTable $clientGovernorateDataTable)
    {
        return $clientGovernorateDataTable->render('client_governorates.index');
    }

    /**
     * Show the form for creating a new ClientGovernorate.
     *
     * @return Response
     */
    public function create()
    {
        return view('client_governorates.create');
    }

    /**
     * Store a newly created ClientGovernorate in storage.
     *
     * @param CreateClientGovernorateRequest $request
     *
     * @return Response
     */
    public function store(CreateClientGovernorateRequest $request)
    {
        $input = $request->all();

        $clientGovernorate = $this->clientGovernorateRepository->create($input);

        Flash::success('Client Governorate saved successfully.');

        return redirect(route('clientGovernorates.index'));
    }

    /**
     * Display the specified ClientGovernorate.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $clientGovernorate = $this->clientGovernorateRepository->find($id);

        if (empty($clientGovernorate)) {
            Flash::error('Client Governorate not found');

            return redirect(route('clientGovernorates.index'));
        }

        return view('client_governorates.show')->with('clientGovernorate', $clientGovernorate);
    }

    /**
     * Show the form for editing the specified ClientGovernorate.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $clientGovernorate = $this->clientGovernorateRepository->find($id);

        if (empty($clientGovernorate)) {
            Flash::error('Client Governorate not found');

            return redirect(route('clientGovernorates.index'));
        }

        return view('client_governorates.edit')->with('clientGovernorate', $clientGovernorate);
    }

    /**
     * Update the specified ClientGovernorate in storage.
     *
     * @param  int              $id
     * @param UpdateClientGovernorateRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateClientGovernorateRequest $request)
    {
        $clientGovernorate = $this->clientGovernorateRepository->find($id);

        if (empty($clientGovernorate)) {
            Flash::error('Client Governorate not found');

            return redirect(route('clientGovernorates.index'));
        }

        $clientGovernorate = $this->clientGovernorateRepository->update($request->all(), $id);

        Flash::success('Client Governorate updated successfully.');

        return redirect(route('clientGovernorates.index'));
    }

    /**
     * Remove the specified ClientGovernorate from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $clientGovernorate = $this->clientGovernorateRepository->find($id);

        if (empty($clientGovernorate)) {
            Flash::error('Client Governorate not found');

            return redirect(route('clientGovernorates.index'));
        }

        $this->clientGovernorateRepository->delete($id);

        Flash::success('Client Governorate deleted successfully.');

        return redirect(route('clientGovernorates.index'));
    }
}
