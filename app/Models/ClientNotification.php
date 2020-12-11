<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ClientNotification
 * @package App\Models
 * @version December 11, 2020, 2:15 pm UTC
 *
 * @property string $is_seen
 * @property integer $client_id
 * @property integer $notification_id
 */
class ClientNotification extends Model
{
    use SoftDeletes;

    public $table = 'client_notifications';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'is_seen',
        'client_id',
        'notification_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'is_seen' => 'string',
        'client_id' => 'integer',
        'notification_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'is_seen' => 'required'
    ];


}
