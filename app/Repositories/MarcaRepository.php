<?php

namespace App\Repositories;

use App\Models\Marca;
use InfyOm\Generator\Common\BaseRepository;


class MarcaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [

    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Marca::class;
    }
}
