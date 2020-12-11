<?php

namespace App\Repositories;

use App\Models\DonationOrder;
use App\Repositories\BaseRepository;

/**
 * Class DonationOrderRepository
 * @package App\Repositories
 * @version December 11, 2020, 1:22 pm UTC
*/

class DonationOrderRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'blood_count',
        'hospital_address',
        'phone',
        'notes',
        'city_id',
        'blood_type_id',
        'client_id'
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
        return DonationOrder::class;
    }
}
