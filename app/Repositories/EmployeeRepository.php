<?php

namespace App\Repositories;

use App\Models\Employee;
use App\Repositories\BaseRepository;

/**
 * Class EmployeeRepository
 * @package App\Repositories
 * @version February 10, 2022, 9:13 am UTC
*/

class EmployeeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'company_id',
        'passport_number',
        'first_name',
        'last_name',
        'middle_name',
        'position',
        'phone',
        'address'
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
        return Employee::class;
    }

    /**
     * Build a query for retrieving all records.
     *
     * @param array $search
     * @param int|null $skip
     * @param int|null $limit
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function allQuery($search = [], $skip = null, $limit = null)
    {
        $query = $this->model->newQuery();

        if (count($search)) {
            foreach($search as $key => $value) {
                if (in_array($key, $this->getFieldsSearchable())) {
                    $query->where($key, $value);
                }
            }
        }

        if (!is_null($skip)) {
            $query->skip($skip);
        }

        if (!is_null($limit)) {
            $query->limit($limit);
        }

        $user = auth()->user();
        if ($user && $user->company) {
            $query->where('company_id', $user->company->id);
        } else {
            $query->where('id', null); // Agar company_id bo'lmasa!
        }

        return $query;
    }

    public function find($id, $columns = ['*'])
    {
        $query = $this->model->newQuery();

        $query = $query->find($id, $columns);

        $user = auth()->user();
        if ($user && $user->company && $query->company_id == $user->company->id) {
            return $query;
        }
        return null;
    }
}
