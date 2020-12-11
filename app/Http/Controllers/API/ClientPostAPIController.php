<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateClientPostAPIRequest;
use App\Http\Requests\API\UpdateClientPostAPIRequest;
use App\Models\ClientPost;
use App\Repositories\ClientPostRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ClientPostController
 * @package App\Http\Controllers\API
 */

class ClientPostAPIController extends AppBaseController
{
    /** @var  ClientPostRepository */
    private $clientPostRepository;

    public function __construct(ClientPostRepository $clientPostRepo)
    {
        $this->clientPostRepository = $clientPostRepo;
    }

    /**
     * Display a listing of the ClientPost.
     * GET|HEAD /clientPosts
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $clientPosts = $this->clientPostRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($clientPosts->toArray(), 'Client Posts retrieved successfully');
    }

    /**
     * Store a newly created ClientPost in storage.
     * POST /clientPosts
     *
     * @param CreateClientPostAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateClientPostAPIRequest $request)
    {
        $input = $request->all();

        $clientPost = $this->clientPostRepository->create($input);

        return $this->sendResponse($clientPost->toArray(), 'Client Post saved successfully');
    }

    /**
     * Display the specified ClientPost.
     * GET|HEAD /clientPosts/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ClientPost $clientPost */
        $clientPost = $this->clientPostRepository->find($id);

        if (empty($clientPost)) {
            return $this->sendError('Client Post not found');
        }

        return $this->sendResponse($clientPost->toArray(), 'Client Post retrieved successfully');
    }

    /**
     * Update the specified ClientPost in storage.
     * PUT/PATCH /clientPosts/{id}
     *
     * @param int $id
     * @param UpdateClientPostAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateClientPostAPIRequest $request)
    {
        $input = $request->all();

        /** @var ClientPost $clientPost */
        $clientPost = $this->clientPostRepository->find($id);

        if (empty($clientPost)) {
            return $this->sendError('Client Post not found');
        }

        $clientPost = $this->clientPostRepository->update($input, $id);

        return $this->sendResponse($clientPost->toArray(), 'ClientPost updated successfully');
    }

    /**
     * Remove the specified ClientPost from storage.
     * DELETE /clientPosts/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ClientPost $clientPost */
        $clientPost = $this->clientPostRepository->find($id);

        if (empty($clientPost)) {
            return $this->sendError('Client Post not found');
        }

        $clientPost->delete();

        return $this->sendSuccess('Client Post deleted successfully');
    }
}
