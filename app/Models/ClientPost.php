<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ClientPost
 * @package App\Models
 * @version December 11, 2020, 2:23 pm UTC
 *
 * @property integer $client_id
 * @property integer $post_id
 */
class ClientPost extends Model
{
    use SoftDeletes;

    public $table = 'client_posts';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'client_id',
        'post_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'client_id' => 'integer',
        'post_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
