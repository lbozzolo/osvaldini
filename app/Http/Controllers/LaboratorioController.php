<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateServicioRequest;
use App\Http\Requests\UpdateServicioRequest;
use App\Repositories\ServicioRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class LaboratorioController extends AppBaseController
{
    /** @var  ServicioRepository */
    private $servicioRepository;

    public function __construct(ServicioRepository $servicioRepo)
    {
        $this->servicioRepository = $servicioRepo;
    }

    /**
     * Display a listing of the Servicio.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->servicioRepository->pushCriteria(new RequestCriteria($request));
        $servicios = $this->servicioRepository->all();

        return view('servicios.index')
            ->with('servicios', $servicios);
    }

    /**
     * Show the form for creating a new Servicio.
     *
     * @return Response
     */
    public function create()
    {
        return view('servicios.create');
    }

    /**
     * Store a newly created Servicio in storage.
     *
     * @param CreateServicioRequest $request
     *
     * @return Response
     */
    public function store(CreateServicioRequest $request)
    {
        $input = $request->all();
        $servicio = $this->servicioRepository->create($input);

        return redirect(route('servicios.index'))->with('ok', 'Servicio creado con éxito');
    }

    /**
     * Display the specified Servicio.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $servicio = $this->servicioRepository->findWithoutFail($id);

        if (empty($servicio))
            return redirect(route('servicios.index'))->withErrors('Servicio no encontrado');

        return view('servicios.show')->with('servicio', $servicio);
    }

    /**
     * Show the form for editing the specified Servicio.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $servicio = $this->servicioRepository->findWithoutFail($id);

        if (empty($servicio))
            return redirect(route('servicios.index'))->withErrors('Servicio no encontrado');

        return view('servicios.edit')->with('servicio', $servicio);
    }

    /**
     * Update the specified Servicio in storage.
     *
     * @param  int              $id
     * @param UpdateServicioRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateServicioRequest $request)
    {
        $servicio = $this->servicioRepository->findWithoutFail($id);

        if (empty($servicio))
            return redirect(route('servicios.index'))->withErrors('Servicio no encontrado');

        $servicio = $this->servicioRepository->update($request->all(), $id);

        return redirect(route('servicios.index'))->with('ok', 'Servicio actualizado con éxito');
    }

    /**
     * Remove the specified Servicio from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $servicio = $this->servicioRepository->findWithoutFail($id);

        if (empty($servicio))
            return redirect(route('servicios.index'))->withErrors('Servicio no encontrado');

        $this->servicioRepository->delete($id);

        return redirect(route('servicios.index'))->with('ok', 'Servicio eliminado con éxito');
    }
}
