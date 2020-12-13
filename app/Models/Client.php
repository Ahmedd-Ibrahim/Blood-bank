<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Client
 * @package App\Models
 * @version December 11, 2020, 1:36 pm UTC
 *
 * @property string $name
 * @property string $email
 * @property string $bdate
 * @property integer $blood_type_id
 * @property integer $last_donation_date
 * @property integer $city_id
 * @property string $phone
 * @property string $password
 */
class Client extends Model
{
    use SoftDeletes;

    public $table = 'clients';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'email',
        'bdate',
        'blood_type_id',
        'last_donation_date',
        'city_id',
        'phone',
        'password'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'bdate' => 'date',
        'blood_type_id' => 'integer',
        'last_donation_date' => 'integer',
        'city_id' => 'integer',
        'phone' => 'string',
        'password' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

        'name' => 'required',
        'email'=> 'required',
        'bdate'=> 'required',
        'blood_type_id'=> 'required',
        'last_donation_date'=> 'required',
        'city_id' => 'required',
        'phone'   => 'required',
        'password'=> 'required'
    ];


    /* Begin Relations */

    public function BloodType()
    {
        return $this->belongsTo(BloodType::class,'blood_type_id');
    }

    public function BloodTypes()
    {
        return $this->belongsToMany(BloodType::class,'blood_type_clients');
    }

    public function City()
    {
        return $this->belongsTo(City::class,'city_id');
    }

    public function Posts()
    {
        return $this->hasMany(Post::class,'client_id');
    }

    public function FavourPosts()
    {
        return $this->belongsToMany(Post::class,'client_posts');
    }

    public function ContactUsMessages()
    {
        return $this->hasMany(ContactUsMessage::class,'client_id');
    }

    public function DonationOrders()
    {
        return $this->hasMany(DonationOrder::class,'client_id');
    }

    public function Notifications()
    {
        return $this->belongsToMany(Notification::class,'client_notifications');
    }

    public function Governorates()
    {
        return $this->belongsToMany(Governorate::class,'client_governorates');
    }

    public function ContactUsMessage()
    {
        return $this->hasMany(ContactUsMessage::class,'client_id');
    }
    /* End  Relations */


}
