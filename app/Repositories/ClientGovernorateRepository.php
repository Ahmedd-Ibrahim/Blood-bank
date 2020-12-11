<?php

namespace App\Repositories;

use App\Models\ClientGovernorate;
use App\Repositories\BaseRepository;

/**
 * Class ClientGovernorateRepository
 * @package App\Repositories
 * @version December 11, 2020, 2:24 pm UTC
*/

class ClientGovernorateRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'client_id',
        'governorate_id'
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
        return ClientGovernorate::class;
    }
}
