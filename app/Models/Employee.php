<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class Employee
 * @package App\Models
 * @version February 10, 2022, 9:13 am UTC
 *
 * @property \App\Models\Company $company
 * @property integer $company_id
 * @property string $passport_number
 * @property string $first_name
 * @property string $last_name
 * @property string $middle_name
 * @property string $position
 * @property string $phone
 * @property string $address
 */
class Employee extends Model
{
    public $fillable = [
        'company_id',
        'passport_number',
        'first_name',
        'last_name',
        'middle_name',
        'position',
        'phone',
        'address'
    ];

    protected $hidden = [self::CREATED_AT, self::UPDATED_AT];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'company_id' => 'integer',
        'passport_number' => 'string',
        'first_name' => 'string',
        'last_name' => 'string',
        'middle_name' => 'string',
        'position' => 'string',
        'phone' => 'string',
        'address' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'company_id' => 'nullable',
        'passport_number' => 'required|string|max:255',
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'middle_name' => 'nullable|string|max:255',
        'position' => 'required|string|max:255',
        'phone' => 'nullable|string|max:255',
        'address' => 'nullable|string|max:255'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function company()
    {
        return $this->belongsTo(\App\Models\Company::class, 'company_id');
    }
}
