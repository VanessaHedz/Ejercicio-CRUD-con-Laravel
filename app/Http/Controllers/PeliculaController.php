<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use Illuminate\Http\Request;

class PeliculaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peliculas = Pelicula::all();
        // return view('cruds', compact('peliculas'));
        return view('cruds', ['peliculas'=>$peliculas]);
    }

    public function delete(Request $request){
        // $pelicula = Pelicula::find($id);
      
        // $pelicula->delete();

        $pelicula = Pelicula::find($request->id);
 
        if(!$pelicula){
            return response()->json([
                'success' => false,
                'message' => 'Ocurrió un error al eliminar la película.'
            ]);
        }
      
        $success = $pelicula->delete();

        if (!$success){
            return response()->json([
                'success' => false,
                'message' => 'Ocurrió un error al eliminar la película.'
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Se creó correctamente la película.'
        ]);
    }

    public function add(Request $request)
    {
        //dd($request->all());
        // $pelicula = Pelicula::create([
        //     'titulo' => $request->input('title'),
        //     'tipo' => $request->input('tipo'),
        //     'genero' => $request->input('genero'),
        //     'anio' => $request->input('year'),
        //     'plataforma' => $request->input('plataforma')
        // ]);

        //$pelicula = Pelicula::create($request->all());

        $pelicula = new Pelicula();
        $pelicula->titulo = $request->input('titulo');
        $pelicula->tipo = $request->input('tipo');
        $pelicula->genero = $request->input('genero');
        $pelicula->anio = $request->input('anio');
        $pelicula->plataforma = $request->input('plataforma');
        $pelicula->save();


        if(!$pelicula){
            return response()->json([
                'success' => false,
                'message' => 'Ocurrió un error al crear la película.'
            ]);
        }


        return response()->json([
            'success' => true,
            'message' => 'Se creó correctamente la película.'
        ]);
    }

    public function watch(Request $request)
    {
        $pelicula = Pelicula::find($request->id);
        //dd($pelicula);

        if(!$pelicula){
            return response()->json([
                'success' => false,
                'message' => 'Ocurrió un error al cargar la película.'
            ]);
        }
        return response()->json([
            'data' => $pelicula,
            'success' => true,
            'message' => 'Se cargó correctamente la película.'
        ]);
    }

    public function edit(Request $request){
        $pelicula = Pelicula::find($request->id);
        //dd($pelicula);

        $pelicula->titulo = $request->input('titulo');
        $pelicula->tipo = $request->input('tipo');
        $pelicula->genero = $request->input('genero');
        $pelicula->anio = $request->input('anio');
        $pelicula->plataforma = $request->input('plataforma');

        $pelicula->save();

        // $pelicula->update(
        //     ['titulo' => $request->input('titulo'),
        //     'tipo' => $request->input('tipo'),
        //     'genero' => $request->input('genero'),
        //     'anio' => $request->input('anio'),
        //     'plataforma' => $request->input('plataforma'),
        // ]);

        if(!$pelicula){
            return response()->json([
                'success' => false,
                'message' => 'Ocurrió un error al editar la película.'
            ]);
        }
        return response()->json([
            'data' => $pelicula,
            'success' => true,
            'message' => 'Se editó correctamente la película.'
        ]);
    }
}
