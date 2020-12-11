<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class DonationOrder
 * @package App\Models
 * @version December 11, 2020, 1:22 pm UTC
 *
 * @property string $name
 * @property integer $blood_count
 * @property string $hospital_address
 * @property string $phone
 * @property string $notes
 * @property integer $city_id
 * @property integer $blood_type_id
 * @property integer $client_id
 */
class DonationOrder extends Model
{
    use SoftDeletes;

    public $table = 'donation_orders';


    protected $dates = ['deleted_at'];



    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'age' => 'integer',
        'blood_count' => 'integer',
        'phone' => 'string',
        'notes' => 'string',
        'city_id' => 'integer',
        'blood_type_id' => 'integer',
        'client_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    /* Begin Relations*/
    public function Client()
    {
        return $this->belongsTo(Client::class,'client_id');
    }

    public function City()
    {
        return $this->belongsTo(City::class,'city_id');
    }

    public function BloodType()
    {
        return $this->belongsTo(BloodType::class,'blood_type_id');
    }

    public function Notifications()
    {
        return $this->hasMany(Notification::class,'donation_order_id');
    }

    /* End  Relations*/

}
