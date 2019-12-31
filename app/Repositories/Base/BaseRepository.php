<?php
/**
 * Created by PhpStorm.
 * User: hoang
 * Date: 12/31/19
 * Time: 4:14 PM
 */

namespace App\Repositories\Base;


use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface BaseRepository
{
    function findById($id, $relations = []);

    /**
     * @param $ids
     * @param array $relations
     * @return Collection
     */
    function findByIdIn($ids, $relations = []);
    function create($data);

    /**
     * @param array|null $conditions
     * @return Collection
     */
    function all($conditions = null);
    function delete($id);
    function deleteMany($ids);
    function findByIdAndEdit($id, $data);
    function checkExistByCondition($where);

    /**
     * @param array $relations
     * @return Collection
     */
    function findAllActiveItems($relations = []);
    function insertMany($data);

    /**
     * @param Model $item
     * @return mixed
     */
    function save($item);
    /**
     * @param Model $item
     * @return mixed
     */
    function push($item);

    /**
     * @param Model $item
     * @param $new_data
     * @return Model|mixed
     */
    function update($item, $new_data);


//    function createEnhanceModel();

//    /**
//     * @param AbstractEnhanceModel $model
//     * @return mixed
//     */
//    function getFirstFromEnhanceModel($model);
//    /**
//     * @param AbstractEnhanceModel $model
//     * @return int
//     */
//    function countFromEnhanceModel($model);
//
//    /**
//     * @param AbstractEnhanceModel $model
//     * @param int $offset
//     * @param null $limit
//     * @return Collection
//     */
//    function listFromEnhanceModel($model, $offset = 0, $limit = null);
//
//    /**
//     * @param AbstractEnhanceModel $model
//     * @param $limit
//     * @return LengthAwarePaginator
//     */
//    function paginateFromEnhanceModel($model, $limit);
//
//
//    /**
//     * @param AbstractEnhanceModel $model
//     * @return boolean
//     */
//    function checkExistFromModel($model);

    /**
     * @param array $condition
     * @param array $relations
     * @return Collection
     */
    function find($condition, $relations = []);
}
