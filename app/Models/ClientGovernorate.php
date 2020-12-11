<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ClientGovernorate
 * @package App\Models
 * @version December 11, 2020, 2:24 pm UTC
 *
 * @property integer $client_id
 * @property integer $governorate_id
 */
class ClientGovernorate extends Model
{
    use SoftDeletes;

    public $table = 'client_governorates';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'client_id',
        'governorate_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'client_id' => 'integer',
        'governorate_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
