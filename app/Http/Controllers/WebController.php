<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\ContactRequest;
use App\Models\Categoria;
use App\Models\Farmacia;
use App\Models\Image;
use App\Models\Producto;
use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Mail;
use App\Models\Slider;
use Illuminate\Support\Facades\DB;

class WebController extends AppBaseController
{

    public function index()
    {
        $data['slider'] = Slider::where('active', '1')->first();
        $data['productos'] = Producto::where('highlight', 1)->get();

        return view('web.home')->with($data);
    }

    public function farmacia()
    {
        $data['nosotros'] = Farmacia::where('active', '==', 1)->first();
        return view('web.farmacia')->with($data);
    }

    public function servicios()
    {
        $data['servicios'] = Servicio::where('active', '!=', null)->get();
        return view('web.servicios')->with($data);
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
        $data['nosotros'] = Farmacia::where('active', 1)->first();
        //dd($data);
        return view('web.nosotros')->with($data);
    }

    public function galeria()
    {
        $data['images'] = Image::where('imageable_id', null)->get();
        return view('web.galeria')->with($data);
    }

    public function detalleProducto($id)
    {
        $producto = Producto::find($id);
        //dd($producto->mainImage());

        if (empty($producto))
            return redirect()->back()->withErrors('Producto no encontrado');

        return view('web.detalle-producto', compact('producto'));
    }

    public function contacto()
    {
        return view('web.contacto');
    }

    public function postContacto(ContactRequest $request)
    {
        //dd($request->all());

        $data = array(
            'name_contact' => $request->name_contact,
            'lastname_contact' => $request->lastname_contact,
            'phone_contact' => $request->phone_contact,
            'email_contact' => $request->email_contact,
            'message_contact' => $request->message_contact,
            'subject' => 'Contacto de cliente'
        );

        Mail::send('emails.contacto', ['data' => $data], function($message) use ($data){
            $message->to(config('mail.username'));
            $message->subject($data['subject']);
            $message->from($data['email_contact']);
        });

        return redirect()->back()->with('ok', 'Su correo se ha enviado con éxito.');


    }


}
