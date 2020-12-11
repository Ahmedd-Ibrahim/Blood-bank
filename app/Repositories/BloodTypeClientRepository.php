<?php

namespace App\Repositories;

use App\Models\BloodTypeClient;
use App\Repositories\BaseRepository;

/**
 * Class BloodTypeClientRepository
 * @package App\Repositories
 * @version December 11, 2020, 2:26 pm UTC
*/

class BloodTypeClientRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
        return BloodTypeClient::class;
    }
}
