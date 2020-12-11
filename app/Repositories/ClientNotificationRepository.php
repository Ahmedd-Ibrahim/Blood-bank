<?php

namespace App\Repositories;

use App\Models\ClientNotification;
use App\Repositories\BaseRepository;

/**
 * Class ClientNotificationRepository
 * @package App\Repositories
 * @version December 11, 2020, 2:15 pm UTC
*/

class ClientNotificationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'is_seen',
        'client_id',
        'notification_id'
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
        return ClientNotification::class;
    }
}
