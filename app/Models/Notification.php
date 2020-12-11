<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Notification
 * @package App\Models
 * @version December 11, 2020, 1:15 pm UTC
 *
 * @property string $title
 * @property string $content
 * @property integer $donation_order_id
 */
class Notification extends Model
{
    use SoftDeletes;

    public $table = 'notifications';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'title',
        'content',
        'donation_order_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'donation_order_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    public function DonationOrder()
    {
        return $this->belongsTo(DonationOrder::class,'donation_order_id');
    }


}
