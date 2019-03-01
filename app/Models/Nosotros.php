<?php

namespace App\Models;

use Eloquent as Model;
use App\Models\Image;

/**
 * Class Farmacia
 * @package App\Models
 * @version September 3, 2018, 10:38 pm UTC
 *
 * @property string title
 * @property string body
 */
class Nosotros extends Model
{
    public $table = 'nosotros';

    public $fillable = [
        'title',
        'body',
        'active'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'body' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'body' => 'required'
    ];

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    
}
