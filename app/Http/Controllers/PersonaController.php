<?php

namespace App\Http\Controllers;

use App\Persona;
use App\Registro;
use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:personas.index')->only(['index']);
        $this->middleware('permission:personas.create')->only(['store']);
        $this->middleware('permission:personas.edit')->only(['update']);
        $this->middleware('permission:personas.destroy')->only(['destroy']);
    }
    public function index(Registro $grupo, Request $request){
    	if($request->ajax()){
    		return response()->json($grupo->personas, 200);
    	}
    	return view('personas.index');
    }

    public function store(Registro $grupo, Request $request){
        if($request->ajax()){

            $persona = new Persona();
            $persona->name = $request->input('name');
            $persona->picture = $request->input('picture');
            $persona->registro()->associate($grupo)->save();
            //$persona->save();

            return response()->json([
                //"grupo"=>$grupo,
                "message" => "Persona Creada Correctamente.",
                "persona" => $persona
            ], 200);
        }
    }

    public function update(Registro $grupo, Request $request, $id){
        if($request->ajax()){

            $persona = Persona::find($id);
            $persona->name = $request->input('name');
            $persona->picture = $request->input('picture');
            $persona->registro()->associate($grupo)->save();

            return response()->json($persona);
        }
    }

    public function destroy(Registro $grupo, $id)
    {
        $persona = Persona::find($id);
        $persona->registro()->associate($grupo)->delete();
    }
}
