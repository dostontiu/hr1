<?php

namespace App\Repositories;

use App\Models\Company;
use App\Models\User;
use App\Repositories\BaseRepository;

/**
 * Class CompanyRepository
 * @package App\Repositories
 * @version February 10, 2022, 7:18 am UTC
*/

class CompanyRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'name',
        'director',
        'email',
        'site',
        'phone'
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
        return Company::class;
    }

    public function createUser($input)
    {
        return User::create([
            'username' => $input['username'],
            'password' => bcrypt($input['password']),
            'role_id' => 2,
        ]);
    }
}
