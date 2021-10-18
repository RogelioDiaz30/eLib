<?php

namespace App\Http\Controllers;

use App\Models\Libros;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class librosController extends Controller
{
    public function vistaLibros(){
        return view('pages.libros');
    }

    public function listarLibros(){
        $libros = Libros::all();
        return $libros;
    }
    
    public function guardarLibro(Request $request){
        $nuevoLibro = new Libros();

        $nuevoLibro->titulo = $request->titulo;
        $nuevoLibro->autor = $request->autor;
        $nuevoLibro->editorial = $request->editorial;
        $nuevoLibro->genero = $request->genero;
        $nuevoLibro->isbn = $request->isbn;
        $nuevoLibro->estanteria = $request->estanteria;
        $nuevoLibro->estatus = $request->estatus;
        if (is_file($request->file('archivo'))) {
            $nuevoLibro->rutaImagen = $request->file('archivo')->store('libros', 'public');
        } else {
            $nuevoLibro->rutaImagen = '../argon/img/brand/favicon.png';
        }

        $nuevoLibro->save();
    }
    public function editarLibro(Request $request){
        $libro = Libros::find($request->id);

        $libro->titulo = $request->titulo;
        $libro->autor = $request->autor;
        $libro->editorial = $request->editorial;
        $libro->genero = $request->genero;
        $libro->isbn = $request->isbn;
        $libro->estanteria = $request->estanteria;
        $libro->estatus = $request->estatus;
        if (is_file($request->file('archivo'))) {
            $deletePath = "public/" . $libro->rutaImagen;
            Storage::delete($deletePath);
            $libro->rutaImagen = $request->file('archivo')->store('libros', 'public');
        }

        $libro->save();
    }

    public function eliminarLibro($idLibro){
        $libro = Libros::find($idLibro);
        $deletePath = "public/" . $libro->rutaImagen;

        Storage::delete($deletePath);
        $libro->delete();
    }
}
