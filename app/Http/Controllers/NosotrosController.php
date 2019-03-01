<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNosotrosRequest;
use App\Http\Requests\UpdateNosotrosRequest;
use App\Models\Nosotros;
use App\Repositories\NosotrosRepository;
use App\Http\Controllers\AppBaseController as AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class NosotrosController extends AppBaseController
{
    private $nosotrosRepository;

    public function __construct(NosotrosRepository $nosotrosRepository)
    {
        $this->nosotrosRepository = $nosotrosRepository;
    }

    public function index(Request $request)
    {
        $this->nosotrosRepository->pushCriteria(new RequestCriteria($request));
        $nosotros = $this->nosotrosRepository->all();

        return view('nosotros.index')
            ->with('nosotros', $nosotros);
    }

    public function create()
    {
        return view('nosotros.create');
    }

    public function store(CreateNosotrosRequest $request)
    {
        $input = $request->all();
        $nosotros = $this->nosotrosRepository->create($input);

        if (empty($nosotros))
            return redirect(route('nosotros.index'))->withErrors('Ocurrió un error');

        return redirect(route('nosotros.index'))->with('ok', 'Éxito');
    }

    public function show($id)
    {
        $nosotros = $this->nosotrosRepository->findWithoutFail($id);

        if (empty($nosotros))
            return redirect(route('nosotros.index'))->withErrors('Ocurrió un error');

        return view('nosotros.show')->with('nosotros', $nosotros);
    }

    public function edit($id)
    {
        $nosotros = $this->nosotrosRepository->findWithoutFail($id);

        if (empty($nosotros))
            return redirect(route('nosotros.index'))->withErrors('Ocurrió un error');

        return view('nosotros.edit')->with('nosotros', $nosotros);
    }

    public function update($id, UpdateNosotrosRequest $request)
    {
        $nosotro = $this->nosotrosRepository->findWithoutFail($id);
        $nosotros = Nosotros::all();

        if (empty($nosotro))
            return redirect(route('nosotros.index'))->withErrors('Ocurrió un error');

        $nosotro = $this->nosotrosRepository->update($request->all(), $id);

        if($nosotro->active == 1){
            foreach($nosotros as $nos){
                $nos->active = null;
                $nos->save();
            }
            $nosotro->active = 1;
            $nosotro->save();
        }


        return redirect(route('nosotros.index'))->with('ok', 'Éxito');
    }

    public function destroy($id)
    {
        $nosotros = $this->nosotrosRepository->findWithoutFail($id);

        if (empty($nosotros))
            return redirect(route('nosotros.index'))->withErrors('Ocurrió un error');

        $this->nosotrosRepository->delete($id);

        return redirect(route('nosotros.index'))->with('ok', 'Éxito');
    }

}
