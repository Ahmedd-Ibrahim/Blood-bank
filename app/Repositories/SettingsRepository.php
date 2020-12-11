<?php

namespace App\Repositories;

use App\Models\Settings;
use App\Repositories\BaseRepository;

/**
 * Class SettingsRepository
 * @package App\Repositories
 * @version December 11, 2020, 2:19 pm UTC
*/

class SettingsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'phone',
        'fb_link',
        'insta_link',
        'ytb_link',
        'email',
        'twitter_link',
        'about_us',
        'notification_settings'
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
        return Settings::class;
    }
}
