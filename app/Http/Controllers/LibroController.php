<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;

use Illuminate\Support\Facades\Http;

class LibroController extends Controller
{
    /**
     * CONSULTAR 
     */
     public function index()
    { 
        // Obtener datos de la tabla en la BD*
        $libros = Libro::all();
       
        return view('Libros.index', compact('libros'));  //Enviar los datos a la vista "Index"
       
    }

    /**
     * INSERTAR
     */
    public function create()
    {
        return view('Libros.create');
    }

    /**
     * Guardar en la base de datos 
     */
    public function store(Request $request)
    {
        //Enviar datos a la BD 
        Libro::create([
        'nombre'=>$request-> nombre,
        'autor' => $request-> autor,
        'editorial' => $request-> editorial,
        'precio'=> $request-> precio,
        ]);
            return redirect()->route('libros.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * VISTA DE LA ACTUALIZACION 
     */
    public function edit(Libro $libro)
    {
        #Mandar la vista junto a la informacion del libro 
        return view('Libros.edit', compact('libro'));

    }

    /**
     * ACTUALIZAR REGISTRO 
     */
    public function update(Request $request, Libro $libro)
    {
        $request -> validate([
            'nombre' => 'required ', 
            'autor' => 'required ', 
            'editorial' => 'required ', 
            'precio' => 'required ',         

        ]);

        //Enviar todos los datos para actualizar 
        $libro -> update($request -> all()); 
        //Redireccionar al usuario a los libros 
        return redirect()-> route('libros.index')-> with('success', 'Registro actualizado :DD  ');
    }

    /**
     * ELIMINAR 
     */
    public function destroy(Libro $libro)
    {
        //Funcion para eliminar el libro 
        $libro  -> delete(); 

        return  redirect() -> route('libros.index')
        ->with('success', 'Libro eliminado correctamente');  


    }


    //obtener libros mediante API
    public function home(){
        // Manejar la respuesta del API
        $response = Http::get('https://www.googleapis.com/books/v1/volumes', [
            'q' => 'subject:fiction',
            'maxResults' => 12,
            'key' => config('services.google_books.key'),
        ]);

        // Usar operadores ternarios para verificar si el libro tiene informacion
        $libros = $response->json()['items']?? [];

        return view('libros.home',compact('libros'));

    }    
}
