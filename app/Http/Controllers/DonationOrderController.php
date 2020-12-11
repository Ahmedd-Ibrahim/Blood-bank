<?php

namespace App\Http\Controllers;

use App\DataTables\DonationOrderDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateDonationOrderRequest;
use App\Http\Requests\UpdateDonationOrderRequest;
use App\Repositories\DonationOrderRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class DonationOrderController extends AppBaseController
{
    /** @var  DonationOrderRepository */
    private $donationOrderRepository;

    public function __construct(DonationOrderRepository $donationOrderRepo)
    {
        $this->donationOrderRepository = $donationOrderRepo;
    }

    /**
     * Display a listing of the DonationOrder.
     *
     * @param DonationOrderDataTable $donationOrderDataTable
     * @return Response
     */
    public function index(DonationOrderDataTable $donationOrderDataTable)
    {
        return $donationOrderDataTable->render('donation_orders.index');
    }

    /**
     * Show the form for creating a new DonationOrder.
     *
     * @return Response
     */
    public function create()
    {
        return view('donation_orders.create');
    }

    /**
     * Store a newly created DonationOrder in storage.
     *
     * @param CreateDonationOrderRequest $request
     *
     * @return Response
     */
    public function store(CreateDonationOrderRequest $request)
    {
        $input = $request->all();

        $donationOrder = $this->donationOrderRepository->create($input);

        Flash::success('Donation Order saved successfully.');

        return redirect(route('donationOrders.index'));
    }

    /**
     * Display the specified DonationOrder.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $donationOrder = $this->donationOrderRepository->find($id);

        if (empty($donationOrder)) {
            Flash::error('Donation Order not found');

            return redirect(route('donationOrders.index'));
        }

        return view('donation_orders.show')->with('donationOrder', $donationOrder);
    }

    /**
     * Show the form for editing the specified DonationOrder.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $donationOrder = $this->donationOrderRepository->find($id);

        if (empty($donationOrder)) {
            Flash::error('Donation Order not found');

            return redirect(route('donationOrders.index'));
        }

        return view('donation_orders.edit')->with('donationOrder', $donationOrder);
    }

    /**
     * Update the specified DonationOrder in storage.
     *
     * @param  int              $id
     * @param UpdateDonationOrderRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDonationOrderRequest $request)
    {
        $donationOrder = $this->donationOrderRepository->find($id);

        if (empty($donationOrder)) {
            Flash::error('Donation Order not found');

            return redirect(route('donationOrders.index'));
        }

        $donationOrder = $this->donationOrderRepository->update($request->all(), $id);

        Flash::success('Donation Order updated successfully.');

        return redirect(route('donationOrders.index'));
    }

    /**
     * Remove the specified DonationOrder from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $donationOrder = $this->donationOrderRepository->find($id);

        if (empty($donationOrder)) {
            Flash::error('Donation Order not found');

            return redirect(route('donationOrders.index'));
        }

        $this->donationOrderRepository->delete($id);

        Flash::success('Donation Order deleted successfully.');

        return redirect(route('donationOrders.index'));
    }
}
