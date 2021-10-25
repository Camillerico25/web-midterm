<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class StudentInfo
 * @package App\Models
 * @version October 25, 2021, 3:49 am UTC
 *
 * @property string $name
 * @property string $lastname
 * @property string $address
 * @property integer $age
 * @property integer $number
 * @property string $course
 * @property integer $year
 */
class StudentInfo extends Model
{
//    use SoftDeletes;

    use HasFactory;

    public $table = 'students_info';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'lastname',
        'address',
        'age',
        'number',
        'course',
        'year'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'lastname' => 'string',
        'address' => 'string',
        'age' => 'integer',
        'number' => 'integer',
        'course' => 'string',
        'year' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'lastname' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'age' => 'required|integer',
        'number' => 'required|integer',
        'course' => 'required|string|max:255',
        'year' => 'required|integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];


}
