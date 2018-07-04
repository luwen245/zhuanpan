<?php

namespace App\Repositories;

trait BaseTrait
{
    /**
     * Get number of records
     *
     * @return array
     */
    public function getNumber()
    {
        return $this->model->count();
    }

    public function getNumberByWhere($input)
    {
        return $this->model->where($input)->count();
    }

    /**
     * Update columns in the record by id.
     *
     * @param $id
     * @param $input
     * @return App\Models|User
     */
    public function updateColumn($id, $input)
    {
        $this->model = $this->getById($id);

        foreach ($input as $key => $value) {
            $this->model->{$key} = $value;
        }

        return $this->model->save();
    }

    /**
     * Destroy a model.
     *
     * @param  $id
     * @return mixed
     */
    public function destroy($id)
    {
        return $this->getById($id)->delete();
    }

    /**
     * create a data.
     *
     * @param  $input
     * @return mixed
     */
    public function create($input)
    {
        return $this->model->create($input);
    }

    /**
     * Get model by id.
     *
     * @return App\Models
     */
    public function getById($id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * Get model by where.
     *
     * @return App\Model
     */
    public function getByWhere($input)
    {
        return $this->model->where($input)->get();
    }


    /**
     * Get model by where.
     *
     * @return App\Model
     */
    public function getByWhereIn($column,$input)
    {
        return $this->model->whereIn($column,$input)->get();
    }

    /**
     * Get model by where.
     *
     * @return App\Model
     */
    public function getByWhereFirst($input)
    {
        return $this->model->where($input)->first();
    }

    /**
     * Get all the records
     *
     * @return array User
     */
    public function all()
    {
        return $this->model->get();
    }

    /**
     * Get number of the records
     *
     * @param  int $number
     * @param  string $sort
     * @param  string $sortColumn
     * @return Paginate
     */
    public function page($number = 10, $sort = 'desc', $sortColumn = 'created_at')
    {
        return $this->model->orderBy($sortColumn, $sort)->paginate($number);
    }

    /**
     * Store a new record.
     *
     * @param  $input
     * @return User
     */
    public function store($input)
    {
        return $this->save($this->model, $input);
    }

    /**
     * Update a record by id.
     *
     * @param  $id
     * @param  $input
     * @return User
     */
    public function update($id, $input)
    {
        $this->model = $this->getById($id);

        return $this->save($this->model, $input);
    }

    /**
     * Save the input's data.
     *
     * @param  $model
     * @param  $input
     * @return User
     */
    public function save($model, $input)
    {
        $model->fill($input);

        $model->save();

        return $model;
    }
}
