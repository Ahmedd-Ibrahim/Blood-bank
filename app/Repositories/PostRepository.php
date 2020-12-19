<?php

namespace App\Repositories;

use App\Models\Post;
use App\Repositories\BaseRepository;

/**
 * Class PostRepository
 * @package App\Repositories
 * @version December 11, 2020, 1:31 pm UTC
*/

class PostRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'content',
        'image',
        'category_id'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Post::class;
    }

    public function create($input)
    {
        if(isset($input['image']))
        {
            $photo = Resize($input['image'],'posts',300,250);

            $input['image'] = $photo;
        }
        $model = $this->model->newInstance($input);

        $model->save();

        return $model;
    } // end of create

    public function update($input, $id)
    {
        $query = $this->model->newQuery();

        $model = $query->findOrFail($id);

        if (isset($model->image))
        {
            RemoveImageFromDisk($model->image);
            if(isset($input['image']))
            {
                $photo = Resize($input['image'],'posts',300,250);
                $input['image'] = $photo;
            }
        }
        $model->fill($input);

        $model->save();

        return $model;
    } // end of update

    public function delete($id)
    {
        $query = $this->model->newQuery();

        $model = $query->findOrFail($id);

        if (isset($model->image))
        {
            RemoveImageFromDisk($model->image);
        }
        return $model->delete();
    }// end of delete
}
