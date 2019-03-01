<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductoRequest;
use App\Http\Requests\UpdateProductoRequest;
use App\Models\Color;
use App\Models\Categoria;
use App\Models\Laboratorio;
use App\Models\Producto;
use App\Repositories\ProductoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ProductoController extends AppBaseController
{
    private $productoRepository;

    public function __construct(ProductoRepository $productoRepo)
    {
        $this->productoRepository = $productoRepo;
    }

    public function index(Request $request)
    {
        $this->productoRepository->pushCriteria(new RequestCriteria($request));
        $data['productos'] = $this->productoRepository->all();

        return view('productos.index')->with($data);
    }

    public function create()
    {
        $data['categorias'] = Categoria::all()->pluck('name', 'id');
        $data['laboratorios'] = Laboratorio::all()->pluck('name', 'id');

        return view('productos.create')->with($data);
    }

    public function store(CreateProductoRequest $request)
    {
        $input = $request->all();

        $input['categorias'] = array_filter($input['categorias'], function($cat) {
            return !is_null($cat);
        });

        $producto = $this->productoRepository->create($input);

        if($request->file('pdf_file')){
            $file = $request->file('pdf_file');
            $nombre = $file->getClientOriginalName();
            Storage::disk('local')->put($nombre,  File::get($file));

            $producto->pdf_file = $nombre;
            $producto->save();
        }

        return redirect(route('productos.index'))->with('ok', 'Producto creado con éxito');
    }

    public function show($id)
    {
        $producto = $this->productoRepository->findWithoutFail($id);

        if (empty($producto))
            return redirect(route('productos.index'))->withErrors('Producto no encontrado');

        return view('productos.show')->with('producto', $producto);
    }

    public function edit($id)
    {
        $data['producto'] = $this->productoRepository->findWithoutFail($id);
        $data['categorias'] = Categoria::all()->pluck('name', 'id');
        $data['laboratorios'] = Laboratorio::all()->pluck('name', 'id');

        if (empty($data['producto']))
            return redirect(route('productos.index'))->withErrors('Producto no encontrado');

        return view('productos.edit')->with($data);
    }

    public function update($id, UpdateProductoRequest $request)
    {
        $producto = $this->productoRepository->findWithoutFail($id);

        if(!$request->has('highlight'))
            $request['highlight'] = 0;

        if (empty($producto))
            return redirect(route('productos.index'))->withErrors('Producto no encontrado');

        $producto = $this->productoRepository->update($request->all(), $id);

        $producto->categorias()->sync($request->categorias);

        return redirect(route('productos.index'))->with('ok', 'Producto actualizado con éxito');
    }

    public function destroy($id)
    {
        $producto = $this->productoRepository->findWithoutFail($id);

        if (empty($producto))
            return redirect(route('productos.index'))->withErrors('Producto no encontrado');

        $this->productoRepository->delete($id);

        return redirect(route('productos.index'))->with('ok', 'Producto eliminado con éxito');
    }

    public function verPdf($file)
    {
        return response()->make(\Illuminate\Support\Facades\File::get(storage_path("app/".$file)),200)
            ->header('Content-Type', 'application/pdf');
    }

}
