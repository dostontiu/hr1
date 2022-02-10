<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class Company
 * @package App\Models
 * @version February 10, 2022, 7:18 am UTC
 *
 * @property \App\Models\User $user
 * @property \Illuminate\Database\Eloquent\Collection $employees
 * @property integer $user_id
 * @property string $name
 * @property string $director
 * @property string $email
 * @property string $site
 * @property string $phone
 */
class Company extends Model
{
    public $fillable = [
        'user_id',
        'name',
        'director',
        'email',
        'site',
        'phone'
    ];

    protected $hidden = [self::CREATED_AT, self::UPDATED_AT];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'name' => 'string',
        'director' => 'string',
        'email' => 'string',
        'site' => 'string',
        'phone' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'nullable|exists:users,id',
        'name' => 'required|string|max:255',
        'director' => 'required|string|max:255',
        'email' => 'nullable|string|max:255',
        'site' => 'nullable|string|max:255',
        'phone' => 'nullable|string|max:255'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function employees()
    {
        return $this->hasMany(\App\Models\Employee::class, 'company_id');
    }
}
