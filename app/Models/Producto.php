<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Producto
 * @package App\Models
 * @version September 3, 2018, 10:44 pm UTC
 *
 * @property string name
 * @property string code
 */
class Producto extends Model
{
    use SoftDeletes;

    public $table = 'productos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name', 'description', 'code', 'price', 'highlight'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'code' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|max:255',
        'description' => 'max:1500',
        'code' => '',
        'price' => '',
        'categorias' => 'min:1',
    ];

    public function getFechaCreadoAttribute()
    {
        return date_format($this->created_at,"d/m/Y");
    }

    public function getFechaEditadoAttribute()
    {
        return date_format($this->updated_at,"d/m/Y");
    }

    public function mainImage()
    {
        return $this->images()->where('main', 1)->first();
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function getImagesOrderedAttribute()
    {
        $images = $this->images()->get();
        $imagenes = $images->sortByDesc('main')->all();

        return $imagenes;
    }

    public function categorias()
    {
        return $this->morphToMany('App\Models\Categoria', 'categoriable');
    }

    
}
