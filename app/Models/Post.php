<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Post
 * @package App\Models
 * @version December 11, 2020, 1:31 pm UTC
 *
 * @property string $title
 * @property string $content
 * @property string $image
 * @property integer $category_id
 */
class Post extends Model
{
    use SoftDeletes;

    public $table = 'posts';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'title',
        'content',
        'image',
        'category_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'content' => 'string',
        'image' => 'string',
        'category_id' => 'integer',
        'client_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

        'title'  => 'required',
        'content' => 'required',
        'image' => 'required',
        'category_id' => 'required'
    ];


    public function Category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function Client()
    {
        return $this->belongsTo(Client::class,'client_id');
    }
}
