<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BloodType
 * @package App\Models
 * @version December 11, 2020, 2:12 pm UTC
 *
 * @property string $type
 */
class BloodType extends Model
{
    use SoftDeletes;

    public $table = 'blood_types';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'type'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'type' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
