<?php

namespace App\Http\Controllers;

use App\Mail\Contacto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactoController extends Controller
{
    public function index()
    {
        return view('contacto.index');
    }
    public function procesarFormulario(Request $request)
    {
        //dd([$request->nombre, $request->email, $request->mensaje]);
        $request->validate([
            'nombre' => ['required', 'string', 'min:5'],
            'mensaje' => ['required', 'string', 'min:10'],
            'email' => ['required', 'email'],
        ]);
        $email = auth()->user() != null ? auth()->user()->email : $request->email;
        //dd($email);
        try {
            Mail::to("responsable@correo.es")
                ->send(new Contacto($request->nombre, $request->mensaje, $email));
            return redirect()->route('home')->with('mensaje', 'Mensaje enviado');
        } catch (\Exception $ex) {
            return redirect()->route('home')->with('mensaje', 'No se pudo enviar el mensaje!! :(');
        }
    }
}
