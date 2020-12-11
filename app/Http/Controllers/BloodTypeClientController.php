<?php

namespace App\Http\Controllers;

use App\DataTables\BloodTypeClientDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateBloodTypeClientRequest;
use App\Http\Requests\UpdateBloodTypeClientRequest;
use App\Repositories\BloodTypeClientRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class BloodTypeClientController extends AppBaseController
{
    /** @var  BloodTypeClientRepository */
    private $bloodTypeClientRepository;

    public function __construct(BloodTypeClientRepository $bloodTypeClientRepo)
    {
        $this->bloodTypeClientRepository = $bloodTypeClientRepo;
    }

    /**
     * Display a listing of the BloodTypeClient.
     *
     * @param BloodTypeClientDataTable $bloodTypeClientDataTable
     * @return Response
     */
    public function index(BloodTypeClientDataTable $bloodTypeClientDataTable)
    {
        return $bloodTypeClientDataTable->render('blood_type_clients.index');
    }

    /**
     * Show the form for creating a new BloodTypeClient.
     *
     * @return Response
     */
    public function create()
    {
        return view('blood_type_clients.create');
    }

    /**
     * Store a newly created BloodTypeClient in storage.
     *
     * @param CreateBloodTypeClientRequest $request
     *
     * @return Response
     */
    public function store(CreateBloodTypeClientRequest $request)
    {
        $input = $request->all();

        $bloodTypeClient = $this->bloodTypeClientRepository->create($input);

        Flash::success('Blood Type Client saved successfully.');

        return redirect(route('bloodTypeClients.index'));
    }

    /**
     * Display the specified BloodTypeClient.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $bloodTypeClient = $this->bloodTypeClientRepository->find($id);

        if (empty($bloodTypeClient)) {
            Flash::error('Blood Type Client not found');

            return redirect(route('bloodTypeClients.index'));
        }

        return view('blood_type_clients.show')->with('bloodTypeClient', $bloodTypeClient);
    }

    /**
     * Show the form for editing the specified BloodTypeClient.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $bloodTypeClient = $this->bloodTypeClientRepository->find($id);

        if (empty($bloodTypeClient)) {
            Flash::error('Blood Type Client not found');

            return redirect(route('bloodTypeClients.index'));
        }

        return view('blood_type_clients.edit')->with('bloodTypeClient', $bloodTypeClient);
    }

    /**
     * Update the specified BloodTypeClient in storage.
     *
     * @param  int              $id
     * @param UpdateBloodTypeClientRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBloodTypeClientRequest $request)
    {
        $bloodTypeClient = $this->bloodTypeClientRepository->find($id);

        if (empty($bloodTypeClient)) {
            Flash::error('Blood Type Client not found');

            return redirect(route('bloodTypeClients.index'));
        }

        $bloodTypeClient = $this->bloodTypeClientRepository->update($request->all(), $id);

        Flash::success('Blood Type Client updated successfully.');

        return redirect(route('bloodTypeClients.index'));
    }

    /**
     * Remove the specified BloodTypeClient from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $bloodTypeClient = $this->bloodTypeClientRepository->find($id);

        if (empty($bloodTypeClient)) {
            Flash::error('Blood Type Client not found');

            return redirect(route('bloodTypeClients.index'));
        }

        $this->bloodTypeClientRepository->delete($id);

        Flash::success('Blood Type Client deleted successfully.');

        return redirect(route('bloodTypeClients.index'));
    }
}
