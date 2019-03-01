<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Newsletter;

class MarcaController extends AppBaseController
{

    public function index()
    {
        $emails = Newsletter::all();

        return view('newsletter.index', compact('emails'));
    }

    public function suscribe(Request $request)
    {
        $suscription = Newsletter::create(['email' => $request->email_newsletter_2]);

        if(!$suscription)
            return redirect()->back()->withErrors('Ocurrió un error. No se pudo realizar la operación');

        return redirect()->back()->with('ok', 'Felicitaciones, se ha suscripto al newsletter con éxito.');
    }

}
