<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDonationOrderAPIRequest;
use App\Http\Requests\API\UpdateDonationOrderAPIRequest;
use App\Models\DonationOrder;
use App\Repositories\DonationOrderRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class DonationOrderController
 * @package App\Http\Controllers\API
 */

class DonationOrderAPIController extends AppBaseController
{
    /** @var  DonationOrderRepository */
    private $donationOrderRepository;

    public function __construct(DonationOrderRepository $donationOrderRepo)
    {
        $this->donationOrderRepository = $donationOrderRepo;
    }

    /**
     * Display a listing of the DonationOrder.
     * GET|HEAD /donationOrders
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $donationOrders = $this->donationOrderRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($donationOrders->toArray(), 'Donation Orders retrieved successfully');
    }

    /**
     * Store a newly created DonationOrder in storage.
     * POST /donationOrders
     *
     * @param CreateDonationOrderAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateDonationOrderAPIRequest $request)
    {
        $input = $request->all();

        $donationOrder = $this->donationOrderRepository->create($input);

        return $this->sendResponse($donationOrder->toArray(), 'Donation Order saved successfully');
    }

    /**
     * Display the specified DonationOrder.
     * GET|HEAD /donationOrders/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var DonationOrder $donationOrder */
        $donationOrder = $this->donationOrderRepository->find($id);

        if (empty($donationOrder)) {
            return $this->sendError('Donation Order not found');
        }

        return $this->sendResponse($donationOrder->toArray(), 'Donation Order retrieved successfully');
    }

    /**
     * Update the specified DonationOrder in storage.
     * PUT/PATCH /donationOrders/{id}
     *
     * @param int $id
     * @param UpdateDonationOrderAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDonationOrderAPIRequest $request)
    {
        $input = $request->all();

        /** @var DonationOrder $donationOrder */
        $donationOrder = $this->donationOrderRepository->find($id);

        if (empty($donationOrder)) {
            return $this->sendError('Donation Order not found');
        }

        $donationOrder = $this->donationOrderRepository->update($input, $id);

        return $this->sendResponse($donationOrder->toArray(), 'DonationOrder updated successfully');
    }

    /**
     * Remove the specified DonationOrder from storage.
     * DELETE /donationOrders/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var DonationOrder $donationOrder */
        $donationOrder = $this->donationOrderRepository->find($id);

        if (empty($donationOrder)) {
            return $this->sendError('Donation Order not found');
        }

        $donationOrder->delete();

        return $this->sendSuccess('Donation Order deleted successfully');
    }
}
