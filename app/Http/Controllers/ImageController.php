<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateImageRequest;
use App\Http\Requests\UpdateImageRequest;
use App\Repositories\ImageRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Validator;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Image;
use App\Models\Empresa;
use Illuminate\Support\Facades\Auth;

class ImageController extends AppBaseController
{
    /** @var  ImageRepository */
    private $imageRepository;

    public function __construct(ImageRepository $imageRepo)
    {
        $this->imageRepository = $imageRepo;
    }

    /**
     * Display a listing of the Image.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if(!Auth::user()->isSuperAdmin())
            return abort(403);

        $this->imageRepository->pushCriteria(new RequestCriteria($request));
        //$images = $this->imageRepository->all();

        $images = Image::where('imageable_id', null)->get();
        $otras = Image::where('imageable_id', '!=', null)->get();

        return view('images.index')
            ->with(['images' => $images, 'otras' => $otras]);
    }

    /**
     * Show the form for creating a new Image.
     *
     * @return Response
     */
    public function create()
    {
        return view('images.create');
    }

    /**
     * Store a newly created Image in storage.
     *
     * @param CreateImageRequest $request
     *
     * @return Response
     */
    public function store(CreateImageRequest $request)
    {
       /* $input = $request->all();
        $image = $this->imageRepository->create($input);

        return redirect(route('images.index'))->with('ok', 'Imagen creada con éxito');*/
        if(!$request->hasFile('img'))
            return redirect()->back()->withErrors('No ha seleccionado ningún archivo');

        if($request->file('img')){

            $file = $request->file('img');

            // Redirección si excede el máximo tamaño de imagen permitido
            if($file->getClientSize() > config('imagenes.MAX_SIZE_IMAGE'))
                return redirect()->back()->withErrors('La foto es demasiado grande (Debe ser menor a 2M)');

            // Confirma que el archivo no exista en el destino
            $nombre = $this->changeFileNameIfExists($file);

            $imagen = Image::create(['path' => $nombre, 'main' => 0]);
            $imagen->title = ($request->title)? $request->title : '';
            $file->move(public_path('imagenes'), $nombre);

        }
        return redirect()->route('images.index')->with('ok', 'Imagen subida con éxito');

    }

    /**
     * Display the specified Image.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $image = $this->imageRepository->findWithoutFail($id);

        if (empty($image))
            return redirect(route('images.index'))->withErrors('Imagen no encontrada');

        return view('images.show')->with('image', $image);
    }

    /**
     * Show the form for editing the specified Image.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $image = $this->imageRepository->findWithoutFail($id);

        if (empty($image))
            return redirect(route('images.index'))->withErrors('Imagen no encontrada');

        return view('images.edit')->with('image', $image);
    }

    /**
     * Update the specified Image in storage.
     *
     * @param  int              $id
     * @param UpdateImageRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateImageRequest $request)
    {
        $image = $this->imageRepository->findWithoutFail($id);

        if (empty($image))
            return redirect(route('images.index'))->withErrors('Imagen no encontrada');

        $image = $this->imageRepository->update($request->all(), $id);

        return redirect(route('images.index'))->with('ok', 'Imagen actualizada con éxito');
    }

    /**
     * Remove the specified Image from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $image = $this->imageRepository->findWithoutFail($id);

        if (empty($image))
            return redirect(route('images.index'))->withErrors('Imagen no encontrada');

        //$this->imageRepository->forceDelete($id);
        $image->forceDelete();

        File::delete(public_path("imagenes/".$image->path));

        return redirect()->back()->with('ok', 'Imagen eliminada con éxito');
    }

    public function verImage($file)
    {
        $ruta = storage_path("imagenes\\".$file);
        //dd($ruta);
        return response()->make(File::get($ruta),200)
            ->header('Content-Type', 'image/jpg');
    }

    public function storeImage(Request $request, $id, $class)
    {
        if(!$request->hasFile('img'))
            return redirect()->back()->withErrors('No ha seleccionado ningún archivo');

        $class = 'App\Models\\'.$class;
        $model = $class::find($id);
        //dd($request->file('img'));

        // Redirección si supera el máximo de fotos permitido
        if($model->images->count() >= config('imagenes.MAX_NUMBER_IMAGES'))
            return redirect()->back()->withErrors('El número máximo de fotos permitido es '.config('sistema.imagenes.MAX_NUMBER_IMAGES').'. Elimine una foto y vuelva a intentarlo');

        if($request->file('img')){

            $file = $request->file('img');

            // Redirección si excede el máximo tamaño de imagen permitido
            if($file->getClientSize() > config('imagenes.MAX_SIZE_IMAGE'))
                return redirect()->back()->withErrors('La foto es demasiado grande (Debe ser menor a 2M)');

            // Confirma que el archivo no exista en el destino
            $nombre = $this->changeFileNameIfExists($file);

            $imagen = Image::create(['path' => $nombre, 'main' => 0]);
            $imagen->title = ($request->title)? $request->title : '';
            $file->move(public_path('imagenes'), $nombre);
            $model->images()->save($imagen);

        }
        return redirect()->back()->with('ok', 'Imagen subida con éxito');
    }

    public function changeFileNameIfExists($file)
    {
        $nombre = $file->getClientOriginalName();
        $extension = $file->guessExtension();

//        if (file_exists( public_path("imagenes/".$nombre)))
//            $nombre = preg_replace('/\\.[^.\\s]{3,4}$/', '', $nombre) . '-' . str_random(12) . '.' . $extension;


        $nombre = preg_replace('/\\.[^.\\s]{3,4}$/', '', $nombre) . '-' . str_random(18) . '.' . $extension;

        return $nombre;
    }

    public function principalImage($id, $class, $image)
    {
        $imagen = Image::find($image);
        $class = 'App\Models\\'.$class;
        $model = $class::find($id);

        foreach($model->images as $img){
            $img->main = 0;
            $img->save();
        }

        $imagen->main = 1;
        $imagen->save();

        return redirect()->back();
    }

    // Croppie

    public function saveJqueryImageUpload(Request $request, $id, $class)
    {
        $validator = Validator::make($request->all(), [
            'img' => 'required|image|max:'.config('sistema.imagenes.MAX_SIZE_IMAGE'),
        ]);

        if ($validator->fails())
            return $validator->errors();

        $status = "";

        if(!$request->hasFile('img'))
            return redirect()->back()->withErrors('No ha seleccionado ningún archivo');

        $class = 'App\Models\\'.$class;
        $model = $class::find($id);

        // Redirección si supera el máximo de fotos permitido
        if($model->images->count() >= config('sistema.imagenes.MAX_NUMBER_IMAGES'))
            return redirect()->back()->withErrors('El número máximo de fotos permitido es '.config('sistema.imagenes.MAX_NUMBER_IMAGES').'. Elimine una foto y vuelva a intentarlo');

        if($request->file('img')){

            $file = $request->file('img');

            // Redirección si excede el máximo tamaño de imagen permitido
            if($file->getClientSize() > config('sistema.imagenes.MAX_SIZE_IMAGE'))
                return redirect()->back()->withErrors('La foto es demasiado grande (Debe ser menor a 5M)');

            // Confirma que el archivo no exista en el destino
            $nombre = $this->changeFileNameIfExists($file);

            $imagen = Image::create(['path' => $nombre, 'main' => 0]);
            $imagen->title = ($request->title)? $request->title : '';
            $file->move(public_path('imagenes'), $nombre);
            $model->images()->save($imagen);

            $status = "uploaded";

        }

        return response($status,200);
    }

}
