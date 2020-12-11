<?php

namespace App\Repositories;

use App\Models\ContactUsMessage;
use App\Repositories\BaseRepository;

/**
 * Class ContactUsMessageRepository
 * @package App\Repositories
 * @version December 11, 2020, 2:08 pm UTC
*/

class ContactUsMessageRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'message',
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
        return ContactUsMessage::class;
    }
}
