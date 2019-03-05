<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLaboratorioRequest;
use App\Http\Requests\UpdateLaboratorioRequest;
use App\Repositories\LaboratorioRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class LaboratorioController extends AppBaseController
{
    private $laboratorioRepository;

    public function __construct(LaboratorioRepository $laboratorioRepository)
    {
        $this->laboratorioRepository = $laboratorioRepository;
    }

    public function index(Request $request)
    {
        $this->laboratorioRepository->pushCriteria(new RequestCriteria($request));
        $laboratorios = $this->laboratorioRepository->all();

        return view('laboratorios.index')
            ->with('laboratorios', $laboratorios);
    }

    public function create()
    {
        return view('laboratorios.create');
    }

    public function store(CreateLaboratorioRequest $request)
    {
        $input = $request->all();
        $laboratorio = $this->laboratorioRepository->create($input);

        if(!$laboratorio)
            return redirect()->back()->withErrors('Ocurrió un error. No se pudo guardar el laboratorio');

        return redirect()->route('laboratorios.index')->with('ok', 'Laboratorio creado con éxito');
    }

    public function edit($id)
    {
        $laboratorio = $this->laboratorioRepository->findWithoutFail($id);

        if (empty($laboratorio))
            return redirect(route('laboratorios.index'))->withErrors('Laboratorio no encontrado');

        return view('laboratorios.edit')->with('laboratorio', $laboratorio);
    }

    public function update($id, UpdateLaboratorioRequest $request)
    {
        $laboratorio = $this->laboratorioRepository->findWithoutFail($id);

        if (empty($laboratorio))
            return redirect(route('laboratorios.index'))->withErrors('Laboratorio no encontrado');

        $laboratorio = $this->laboratorioRepository->update($request->all(), $id);

        if (empty($laboratorio))
            return redirect(route('laboratorios.index'))->withErrors('No se pudo actualizar el laboratorio seleccionado');

        return redirect(route('laboratorios.index'))->with('ok', 'Laboratorio actualizado con éxito');
    }

    public function destroy($id)
    {
        $laboratorio = $this->laboratorioRepository->findWithoutFail($id);

        if (empty($laboratorio))
            return redirect(route('laboratorios.index'))->withErrors('Laboratorio no encontrado');

        $this->laboratorioRepository->delete($id);

        return redirect()->route('laboratorios.index')->with('ok', 'Laboratorio eliminado con éxito');
    }
}
