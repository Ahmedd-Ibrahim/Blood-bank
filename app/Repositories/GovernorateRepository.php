<?php

namespace App\Repositories;

use App\Models\Governorate;
use App\Repositories\BaseRepository;

/**
 * Class GovernorateRepository
 * @package App\Repositories
 * @version December 11, 2020, 2:10 pm UTC
*/

class GovernorateRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
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
        return Governorate::class;
    }
}
