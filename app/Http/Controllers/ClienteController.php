<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request; 
use App\Models\Cliente;
use App\Models\Cargo; 
class ClienteController extends Controller {

public function index(){ 
//Obtener datos por ORM Eloquent    
$clientes = Cliente::paginate(3);
//Obtener datos por el metodo get
//$clientes=DB::table('clientes')
//->get();
//$clientes=DB::insert('select * from clientes where estado= "Activo"');


return view('clientes.index',compact('clientes')); } 


public function crear(Request $request){

    $rules= [
        'nombre'=> 'required | string',
        'apellido'=> 'required',
        'edad'=> 'required | integer',
        'ci'=> 'required|unique:clientes,ci',
        'correo'=> 'required|email',
        'fecha_nac'=> 'required',
        'estado'=> 'required'
    ];

    $mensaje = [
        'required'=>'El :attribute campo requerido',
        'fecha_nac.required'=> 'El campo fecha de nacimiento es requerido'
    ];
    $this->validate($request,$rules, $mensaje);
Cliente::create([ 
           'nombre' => $request->input('nombre'),
            'apellido' => $request->input('apellido'),
            'edad' => $request->input('edad'),
            'ci' => $request->input('ci'),
            'correo' => $request->input('correo'),
            'fecha_nac' => $request->input('fecha_nac'),
            'estado' => $request->input('estado'),
        ]);
			return redirect()->route('index')->with('success','Se creo correctamente!');
    }

public function formulario(){

    $cargos = Cargo::pluck('nombre','id');
    return view('clientes.formulario',compact('cargos'));
   }
    public function eliminar($id){
        $clientes =Cliente::find($id);
        $clientes->delete();
        return redirect()->route('index');
    }
    public function editar($id){
        $clientes=Cliente::find($id);
        return view('clientes.editar',compact('clientes'));

    }
    public function actualizar(Request $request, $id)
    {
    $clientes = Cliente::find($id);
    $clientes->nombre = $request->input('nombre');
    $clientes->apellido = $request->input('apellido');
    $clientes->edad = $request->input('edad');
    $clientes->ci = $request->input('ci');
    $clientes->correo = $request->input('correo');
    $clientes->fecha_nac = $request->input('fecha_nac');
    $clientes->estado = $request->input('estado');
    $clientes->save();
    return redirect()->route('index');
    }

    public function ver($id){
        $clientes=Cliente::find($id);
        return view('clientes.ver',compact('clientes'));

    }
     
    public function buscar(Request $request) {
        $buscar = $request->input('buscar');
        $clientes = Cliente::where('nombre', 'like', "%$buscar%")->paginate(2);
        $vacio = $clientes->isEmpty();
        return view('clientes.index', compact('clientes', 'buscar', 'vacio'));
    }
    

}