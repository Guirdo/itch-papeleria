<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use SebastianBergmann\CodeCoverage\Report\Xml\File;
use App\Document;

class ImprimirController extends Controller
{
    //

    public function index(){
        $documentos = Document::all();
        return view('userAdmin.lista')->with(['documentos'=>$documentos]);
    }

    public function show(Document $documento){
        return view('userAdmin.cotizar',compact('documento'));
    }

    public function update(Document $documento){
        $documento->update(request(['cotizacion']));

        return redirect('/documentos');
    }

    public function store(Request $request){
        $user = $request->user();
        $file = $request->file('file');

        $nomArchivo = $this->subirArchivo($user,$file);
        $tipoImp = $request->rdBN ? 'B/N' : 'COLOR';

        $documento = new Document([
            'idUsuario'=>$user->id,
            'nombreArchivo'=>$nomArchivo,
            'tipoImpresion'=>$tipoImp,
            'rangoPags'=>$request->rangoPags,
            'numeroJuegos'=>$request->numJuegos
        ]);

        $documento->save();
        $enviado = true;

        return redirect('/home')->with(['enviado'=>$enviado]);
    }

    function subirArchivo($user,$file){
        $idUsuario = $user->id;
        $numeroImpresion = $user->numImpresiones;
        $fecha = new \DateTime();
        $fechaImp = $fecha->format('d-m-Y-His');

        $nomArchivo = $idUsuario.'-'.$numeroImpresion.'-'.$fechaImp.'.pdf';

        \Storage::disk('public')->put($nomArchivo, \File::get($file));

        return $nomArchivo;
    }
}
