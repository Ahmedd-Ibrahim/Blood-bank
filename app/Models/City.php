<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class City
 * @package App\Models
 * @version December 11, 2020, 2:11 pm UTC
 *
 * @property string $name
 * @property integer $governorate_id
 */
class City extends Model
{
    use SoftDeletes;

    public $table = 'cities';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'governorate_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'governorate_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];


    /* Begin Relation */

    public function Governorate()
    {
        return $this->belongsTo(Governorate::class,'city_id');
    }
    /* End Relation */


}
