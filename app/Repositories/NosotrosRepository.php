<?php

namespace App\Repositories;

use App\Models\Nosotros;
use InfyOm\Generator\Common\BaseRepository;

class NosotrosRepository extends BaseRepository
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
        return Nosotros::class;
    }
}
