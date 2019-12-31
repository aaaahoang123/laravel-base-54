<?php
/**
 * Created by PhpStorm.
 * User: hoang
 * Date: 12/31/19
 * Time: 4:14 PM
 */

namespace App\Repositories\Base;


use App\Enums\Status\CommonStatus;
use Illuminate\Database\Eloquent\Model;

class AbstractBaseRepository implements BaseRepository
{
    /**
     * @var Model
     */
    protected $model;
    protected $modelClass;

    public function __construct()
    {
        if ($this->modelClass) {
            $this->model = app()->make($this->modelClass);
        }
    }

    protected $inactive_status = CommonStatus::INACTIVE;
    protected $active_status = CommonStatus::ACTIVE;
    protected $status_field = 'status';

    function findById($id, $relations = [])
    {
        return $this->model->newQuery()
            ->with($relations)
            ->where(compact('id'))->first();
    }

    function findByIdIn($ids, $relations = [])
    {
        return $this->model->newQuery()
            ->with($relations)
            ->whereIn('id', $ids)
            ->get();
    }

    function create($data)
    {
        $new = $this->model->newQuery()->create($data);
        return $this->findById($new->id);
    }

    function all($conditions = null)
    {
        $query = $this->model->newQuery();
        if ($conditions) {
            foreach ($conditions as $field => $expression) {
                if (is_array($expression))
                    $query = $query->where($field, ...$expression);
                else
                    $query = $query->where($field, $expression);
            }
        }
        return $query->get();
    }

    function delete($id)
    {
        $instance = $this->findById($id);
        $instance->update([$this->status_field => $this->inactive_status]);
        return $instance;
    }

    function deleteMany($where)
    {
        return $this->model
            ->newQuery()
            ->where($where)
            ->update([$this->status_field => $this->inactive_status]);
    }

    function findByIdAndEdit($id, $data)
    {
        $instance = $this->findById($id);
        $instance->update($data);
        return $instance;
    }

    function checkExistByCondition($where)
    {
        return $this->model->newQuery()
            ->where($where)
            ->exists();
    }

    function findAllActiveItems($relations = [])
    {
        return $this->model->newQuery()
            ->where($this->status_field, $this->active_status)
            ->with($relations)
            ->get();
    }

    function insertMany($data)
    {
        return $this->model->newQuery()
            ->insert($data);
    }

    function save($item)
    {
        $item->save();
        $item->refresh();
        return $item;
    }

    public function push($item)
    {
        $item->push();
        return $item;
    }

    function update($item, $new_data)
    {
        $item->update($new_data);
        return $item;
    }

//    function createEnhanceModel()
//    {
//        /**
//         * @var AbstractEnhanceModel $model
//         */
//        $model = app()->make($this->getEnhanceModelClass());
//        $model->setQuery($this->model->newQuery());
//        return $model;
//    }
//
//
//    public function getFirstFromEnhanceModel($model)
//    {
//        return $model->getQuery()->first();
//    }
//
//    /**
//     * @param AbstractEnhanceModel $model
//     * @return int
//     */
//    function countFromEnhanceModel($model)
//    {
//        return $model->getQuery()->count();
//    }
//
//    function listFromEnhanceModel($model, $offset = 0, $limit = null)
//    {
//        $query = $model
//            ->getQuery();
//        if (is_numeric($offset) && is_numeric($limit))
//            $query->offset($offset)->limit($limit);
//
//        return $query->get();
//    }
//
//    /**
//     * @param AbstractEnhanceModel $model
//     * @param $limit
//     * @return LengthAwarePaginator
//     */
//    function paginateFromEnhanceModel($model, $limit)
//    {
//        return $model->getQuery()->paginate($limit);
//    }
//
//    public function checkExistFromModel($model)
//    {
//        return $model->getQuery()->exists();
//    }
//
    public function find($condition, $relations = [])
    {
        return $this->model
            ->newQuery()
            ->where($condition)
            ->with($relations)
            ->get();
    }
}
