<?php

namespace App\Models;

use Eloquent as Model;
/**
 * Class Farmacia
 * @package App\Models
 * @version September 3, 2018, 10:38 pm UTC
 *
 * @property string title
 * @property string body
 */
class Marca extends Model
{
    public $table = 'marcas';

    public $fillable = ['name'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [];


}
