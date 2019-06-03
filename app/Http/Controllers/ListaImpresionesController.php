<?php

namespace App\Http\Controllers;

use App\Document;
use Illuminate\Support\Facades\Storage;

class ListaImpresionesController extends Controller
{
    //
    public function __invoke(){
        
    }

    public function cotizarArchivo(Document $documento){
        return view('userAdmin.cotizar',compact('documento'));
    }

    public function actualizar(Document $documento){
        $documento->update(request('cotizacion'));

        return redirect('/listaimpresiones');
    }
}
