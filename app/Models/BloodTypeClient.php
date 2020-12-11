<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BloodTypeClient
 * @package App\Models
 * @version December 11, 2020, 2:26 pm UTC
 *
 * @property integer $blood_type_id
 * @property integer $client_id
 */
class BloodTypeClient extends Model
{
    use SoftDeletes;

    public $table = 'blood_type_clients';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
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

    
}
