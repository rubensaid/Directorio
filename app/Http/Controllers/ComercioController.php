<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comercio;
use App\Comentario;

class ComercioController extends Controller
{
    /**
     * Mostrar el directorio de comercios
     */
    public function index()
    {
      $comercios = Comercio::orderBy('publicname', 'asc')->get();
      return view('directorio', ['comercios' => $comercios]);
    }

    /**
     * Mostrar un comercio especifico
     */
    public function show($shortname)
    {
      $comercio = Comercio::where('shortname', $shortname)->firstOrFail();
      $comentarios = Comentario::where('idComercio', $comercio->id)->get();
      
      return view('comercio', ['comercio' => $comercio, 'comentarios' => $comentarios, 'commentStatus' => '']);
    }

    /**
     * Publicar un comentario
     */
    public function update(Request $request, $shortname)
    {
      $comercio = Comercio::where('shortname', $shortname)->firstOrFail();
      $id = $comercio->id;
      
      // ValidateAndCreate: Retorna el texto del estado del comentario (publicado, error en nombre, error en texto)
      $commentStatus = Comentario::ValidateAndCreate([
        'idComercio' => $id,
        'nombre' => $request->get('nombre'),
        'comentario' => $request->get('comentario')
      ]);
      
      $comentarios = Comentario::where('idComercio', $id)->get();
      
      return view('comercio', ['comercio' => $comercio, 'comentarios' => $comentarios, 'commentStatus' => $commentStatus]);
    }
}
