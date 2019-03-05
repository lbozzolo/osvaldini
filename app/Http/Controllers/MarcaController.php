<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMarcaRequest;
use App\Http\Requests\UpdateMarcaRequest;
use App\Http\Controllers\AppBaseController as AppBaseController;
use App\Repositories\MarcaRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class MarcaController extends AppBaseController
{
    private $marcaRepository;

    public function __construct(MarcaRepository $marcaRepository)
    {
        $this->marcaRepository = $marcaRepository;
    }

    public function index(Request $request)
    {
        $this->marcaRepository->pushCriteria(new RequestCriteria($request));
        $marcas = $this->marcaRepository->all();

        return view('marcas.index')
            ->with('marcas', $marcas);
    }

    public function create()
    {
        return view('marcas.create');
    }

    public function store(CreateMarcaRequest $request)
    {
        $input = $request->all();
        $marca = $this->marcaRepository->create($input);

        if(!$marca)
            return redirect()->back()->withErrors('Ocurrió un error. No se pudo guardar la marca');

        return redirect()->route('marcas.index')->with('ok', 'Marca creada con éxito');
    }

    public function edit($id)
    {
        $marca = $this->marcaRepository->findWithoutFail($id);

        if (empty($marca))
            return redirect(route('marcas.index'))->withErrors('Marca no encontrada');

        return view('marcas.edit')->with('marca', $marca);
    }

    public function update($id, UpdateMarcaRequest $request)
    {
        $marca = $this->marcaRepository->findWithoutFail($id);

        if (empty($marca))
            return redirect(route('marcas.index'))->withErrors('Marca no encontrada');

        $marca = $this->marcaRepository->update($request->all(), $id);

        if (empty($marca))
            return redirect(route('marcas.index'))->withErrors('No se pudo actualizar la marca seleccionada');

        return redirect(route('marcas.index'))->with('ok', 'Marca actualizada con éxito');
    }

    public function destroy($id)
    {
        $marca = $this->marcaRepository->findWithoutFail($id);

        if (empty($marca))
            return redirect(route('marcas.index'))->withErrors('Marca no encontrado');

        $this->marcaRepository->delete($id);

        return redirect()->route('marcas.index')->with('ok', 'Marca eliminada con éxito');
    }
}
