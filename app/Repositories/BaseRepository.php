<?php

namespace App\Repositories;

use App\Repositories\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseRepositoryInterface
{
    protected $model;

    /**
     * BaseRepository constructor.
     *
     * @param  Model  $model  The model to be used by the repository
     */
    public function __construct(string $model)
    {
        $this->model = $model;  // Store the class name
    }

    /**
     * Fetch all records from the database.
     *
     * @param  array  $with  Relationships to eager load.
     * @return Collection
     */
    public function fetchAll(array $with = [], array $filterable = [], array $order = [], ?int $limit = null): object
    {
        $query = $this->model::query();

        if (! empty($with)) {
            $query->with($with);
        }

        if (! empty($filterable)) {
            foreach ($filterable as $filter) {
                if (is_array($filter) && count($filter) === 3) {
                    // Check if it's a 'like' condition
                    if (strtolower($filter[1]) === 'like') {
                        $query->where($filter[0], 'like', '%'.$filter[2].'%');
                    } else {
                        $query->where($filter[0], $filter[1], $filter[2]);
                    }
                } elseif (is_array($filter)) {
                    $query->whereIn($filter[0], $filter[1]);
                } elseif (is_string($filter)) {
                    // Handle 'where like' if the condition is a string
                    $query->where(key($filter), 'like', '%'.current($filter).'%');
                } else {
                    $query->where(key($filter), current($filter));
                }
            }
        }

        /**
         * For reference see example below
         *  eg:: ['column_name' => 'asc', 'another_column' => 'desc']
         */
        if (! empty($order)) {
            foreach ($order as $column => $direction) {
                $query->orderBy($column, $direction);
            }
        }

        if ($limit !== null) {
            $query->limit($limit);
        }

        return $query->get();
    }

    /**
     * Fetch a single record by ID.
     *
     * @param  int  $id  The ID of the record.
     * @param  array  $with  Relationships to eager load.
     * @return Model|null
     */
    public function fetch(int $id, array $with = []): object
    {
        $query = $this->model::query();

        if (! empty($with)) {
            $query->with($with);
        }

        return $query->find($id);
    }

    /**
     * Store a new record in the database.
     *
     * @param  array  $data  The data to store.
     * @return Model
     */
    public function store(array $data): object
    {
        return $this->model::create($data);
    }

    /**
     * Update an existing record.
     *
     * @param  array  $data  The data to update.
     * @param  int  $id  The ID of the record to update.
     * @return Model
     */
    public function update(array $data, int $id): object
    {
        $record = $this->model::findOrFail($id);
        $record->update($data);

        return $record;
    }

    /**
     * Update or store an existing record
     *
     * @param  array  $match  The data to compare with
     * @param  $data  the data of the record to update
     * @return Model
     */
    public function updateOrStore(array $match, array $data): object
    {
        $record = $this->model::updateOrCreate($match, $data);

        return $record;
    }

    /**
     * Delete a record by ID.
     *
     * @param  int  $id  The ID of the record to delete.
     */
    public function delete(int $id): bool
    {
        $record = $this->model::findOrFail($id);

        return $record->delete();
    }
}
