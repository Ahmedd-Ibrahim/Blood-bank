<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Governorate
 * @package App\Models
 * @version December 11, 2020, 2:10 pm UTC
 *
 * @property string $name
 */
class Governorate extends Model
{
    use SoftDeletes;

    public $table = 'governorates';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];


    public function Cities()
    {
        return $this->hasMany(City::class,'governorate_id');
    }

}
