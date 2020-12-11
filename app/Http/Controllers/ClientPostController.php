<?php

namespace App\Http\Controllers;

use App\DataTables\ClientPostDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateClientPostRequest;
use App\Http\Requests\UpdateClientPostRequest;
use App\Repositories\ClientPostRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ClientPostController extends AppBaseController
{
    /** @var  ClientPostRepository */
    private $clientPostRepository;

    public function __construct(ClientPostRepository $clientPostRepo)
    {
        $this->clientPostRepository = $clientPostRepo;
    }

    /**
     * Display a listing of the ClientPost.
     *
     * @param ClientPostDataTable $clientPostDataTable
     * @return Response
     */
    public function index(ClientPostDataTable $clientPostDataTable)
    {
        return $clientPostDataTable->render('client_posts.index');
    }

    /**
     * Show the form for creating a new ClientPost.
     *
     * @return Response
     */
    public function create()
    {
        return view('client_posts.create');
    }

    /**
     * Store a newly created ClientPost in storage.
     *
     * @param CreateClientPostRequest $request
     *
     * @return Response
     */
    public function store(CreateClientPostRequest $request)
    {
        $input = $request->all();

        $clientPost = $this->clientPostRepository->create($input);

        Flash::success('Client Post saved successfully.');

        return redirect(route('clientPosts.index'));
    }

    /**
     * Display the specified ClientPost.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $clientPost = $this->clientPostRepository->find($id);

        if (empty($clientPost)) {
            Flash::error('Client Post not found');

            return redirect(route('clientPosts.index'));
        }

        return view('client_posts.show')->with('clientPost', $clientPost);
    }

    /**
     * Show the form for editing the specified ClientPost.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $clientPost = $this->clientPostRepository->find($id);

        if (empty($clientPost)) {
            Flash::error('Client Post not found');

            return redirect(route('clientPosts.index'));
        }

        return view('client_posts.edit')->with('clientPost', $clientPost);
    }

    /**
     * Update the specified ClientPost in storage.
     *
     * @param  int              $id
     * @param UpdateClientPostRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateClientPostRequest $request)
    {
        $clientPost = $this->clientPostRepository->find($id);

        if (empty($clientPost)) {
            Flash::error('Client Post not found');

            return redirect(route('clientPosts.index'));
        }

        $clientPost = $this->clientPostRepository->update($request->all(), $id);

        Flash::success('Client Post updated successfully.');

        return redirect(route('clientPosts.index'));
    }

    /**
     * Remove the specified ClientPost from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $clientPost = $this->clientPostRepository->find($id);

        if (empty($clientPost)) {
            Flash::error('Client Post not found');

            return redirect(route('clientPosts.index'));
        }

        $this->clientPostRepository->delete($id);

        Flash::success('Client Post deleted successfully.');

        return redirect(route('clientPosts.index'));
    }
}
