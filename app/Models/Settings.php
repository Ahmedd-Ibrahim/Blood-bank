<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Settings
 * @package App\Models
 * @version December 11, 2020, 2:19 pm UTC
 *
 * @property string $phone
 * @property string $fb_link
 * @property string $insta_link
 * @property string $ytb_link
 * @property string $email
 * @property string $twitter_link
 * @property string $about_us
 * @property string $notification_settings
 */
class Settings extends Model
{
    use SoftDeletes;

    public $table = 'settings';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'phone' => 'string',
        'fb_link' => 'string',
        'insta_link' => 'string',
        'ytb_link' => 'string',
        'email' => 'string',
        'twitter_link' => 'string',
        'about_us' => 'string',
        'notification_settings' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
