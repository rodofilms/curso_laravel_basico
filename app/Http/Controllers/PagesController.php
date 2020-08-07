<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class PagesController extends Controller
{
    //
    public function index(){
        $notas = App\Nota::all();
        return view('welcome',compact('notas'));
    }
    public function detalle($id){
        // la funcion findOrFail nos busca el id pero automaticamente nos aplica la exepcion si es que no se encuentra el 'id'
        $nota = App\Nota::findOrFail($id);

        return view('notas.detalle',compact('nota'));
    }
    public function agregar(Request $request){
        //return $request->all();

        //validar los campos
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required'
        ]);


        $notaNueva = new App\Nota;
        //"$notaNueva->nombre" y "$notaNueva->descripcion" son el nombre de los input que usamos en el form
        //Nos traemos los datos de la base de datos
        $notaNueva->nombre = $request->nombre;
        $notaNueva->descripcion = $request->descripcion;
        //Guardamos los datos con save()
        $notaNueva->save();
        //Retornamos a la pagina anterior con el mensaje de inserccion correcto
        return back()->with('mensaje', 'Nota agregada');
         
    }
    
    public function editar($id){
        $nota = App\Nota::findOrFail($id);
        return view('notas.editar',compact('nota'));
    }
    public function update(Request $request, $id){
        //validar los campos
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required'
        ]);
        
        //buscamos los campos con el ID que llego por parametros
        $notaUpdate = App\Nota::findOrFail($id);
        // cogemos los datos del request es decir el formulario y los colocamos en la base de datos
        $notaUpdate->nombre = $request->nombre;
        $notaUpdate->descripcion = $request->descripcion;
        //Guardamos los datos con, save()
        $notaUpdate->save();

        return back()->with('mensaje', 'Nota Actualizada');
    }

    public function fotos(){
        return view('bienvenido');
    }
    public function blog(){
        return view('blog');
    }
    public function nosotros($nombre = null){
        $equipo = ['Ignacio','Juanito','Pedrito'];

        //return view('nosotros',['equipo'=>$equipo]);
        return view('nosotros',compact('equipo','nombre'));
    }
}
