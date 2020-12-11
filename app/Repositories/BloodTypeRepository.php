<?php

namespace App\Repositories;

use App\Models\BloodType;
use App\Repositories\BaseRepository;

/**
 * Class BloodTypeRepository
 * @package App\Repositories
 * @version December 11, 2020, 2:12 pm UTC
*/

class BloodTypeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'type'
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
        return BloodType::class;
    }
}
