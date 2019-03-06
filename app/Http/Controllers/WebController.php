<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\ContactRequest;
use App\Models\Categoria;
use App\Models\Image;
use App\Models\Nosotros;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Mail;
use App\Models\Slider;

class WebController extends AppBaseController
{
    public function index()
    {
        $data['slider'] = Slider::where('active', '1')->first();
        $data['productos'] = Producto::where('highlight', 1)->get();

        return view('web.home')->with($data);
    }

    public function productos($categoriaId = null)
    {
        $categoria = ($categoriaId)? Categoria::find($categoriaId) : null;

        $data['productos'] = ($categoria)? new Paginator($categoria->productos, 9) : Producto::with('images')->paginate(9);
        $data['categorias'] = Categoria::all();

        return view('web.productos')->with($data);
    }

    public function nosotros()
    {
        $data['nosotros'] = Nosotros::where('active', 1)->first();
        $data['productos'] = Producto::where('highlight', 1)->get();
        //dd($data);
        return view('web.nosotros')->with($data);
    }

    public function galeria()
    {
        $data['images'] = Image::where('imageable_id', null)->get();
        $data['productos'] = Producto::where('highlight', 1)->get();
        return view('web.galeria')->with($data);
    }

    public function detalleProducto($id)
    {
        $data['producto'] = Producto::find($id);
        $data['productos'] = Producto::where('highlight', 1)->get();

        if (empty($data['producto']))
            return redirect()->back()->withErrors('Producto no encontrado');

        return view('web.detalle-producto')->with($data);
    }

    public function contacto()
    {
        $data['productos'] = Producto::where('highlight', 1)->get();
        return view('web.contacto');
    }

    public function postContacto(ContactRequest $request)
    {
        //dd($request->all());

        $data = array(
            'nombre' => $request->nombre,
            'email' => $request->email,
            'comentario' => $request->comentario,
            'subject' => 'Contacto de cliente'
        );

        Mail::send('emails.contacto', ['data' => $data], function($message) use ($data){
            $message->to(config('mail.username'));
            $message->subject($data['subject']);
            $message->from($data['email']);
        });

        return redirect()->back()->with('ok', 'Su correo se ha enviado con éxito.');


    }


}
