<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ContactUsMessage
 * @package App\Models
 * @version December 11, 2020, 2:08 pm UTC
 *
 * @property string $title
 * @property string $message
 * @property integer $client_id
 */
class ContactUsMessage extends Model
{
    use SoftDeletes;

    public $table = 'contact_us_messages';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'title',
        'message',
        'client_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'client_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];


    public function Client()
    {
        return $this->belongsTo(Client::class,'client_id');
    }
}
