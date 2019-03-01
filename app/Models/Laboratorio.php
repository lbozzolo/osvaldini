<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Servicio
 * @package App\Models
 * @version September 3, 2018, 10:39 pm UTC
 *
 * @property string title
 * @property string body
 */
class Laboratorio extends Model
{
    public $table = 'laboratorios';

    public $fillable = [
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required'
    ];

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function productos()
    {
        return $this->hasMany(Producto::class);
    }

    
}
