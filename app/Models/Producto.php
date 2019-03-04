<?php

namespace App\Models;

use Eloquent as Model;

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
    public $table = 'productos';

    public $fillable = [
        'name', 'description', 'principio_activo', 'presentacion', 'caracteristicas', 'laboratorio_id', 'pdf_file', 'code', 'price', 'highlight'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'code' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|max:255',
        'description' => 'max:1500',
        'principio_activo' => 'max:255',
        'presentacion' => 'max:255',
        'caracteristicas' => 'max:255',
        'code' => 'required',
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
        return $this->belongsToMany('App\Models\Categoria', 'categorias_productos');
    }

    public function laboratorio()
    {
        return $this->belongsTo(Laboratorio::class);
    }

    
}
