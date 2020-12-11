<?php

namespace App\Repositories;

use App\Models\ClientPost;
use App\Repositories\BaseRepository;

/**
 * Class ClientPostRepository
 * @package App\Repositories
 * @version December 11, 2020, 2:23 pm UTC
*/

class ClientPostRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'client_id',
        'post_id'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ClientPost::class;
    }
}
