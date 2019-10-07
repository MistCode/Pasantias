<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Info;
use App\Comunidad;

class MensajeController extends Controller
{
    public function index(Comunidad $comunidad, Request $request)
    {
    	if($request->ajax()){
    		return response()->json($comunidad->infos, 200);
    	}
    	return view('info.index');
    }

    public function store(Comunidad $comunidad, Request $request)
    {
    	if($request->ajax()){
    		$info = new Info();
    		$info->name = $request->input('name');
    		$info->description = $request->input('description');
    		$info->comunidad()->associate($comunidad)->save();

    		return response()->json([
    			"message" => "Mensaje Creado Correctamente.",
    			"info" => $info
    		], 200);
    	}
    }

        public function update(Comunidad $comunidad, Request $request, $id){
        if($request->ajax()){
            $info = Info::find($id);
            $info->name = $request->input('name');
            $info->description = $request->input('description');
            $info->comunidad()->associate($comunidad)->save();

            return response()->json($info);
        }
    }

    public function destroy(Comunidad $comunidad, $id)
    {
        $info = Info::find($id);
        $info->comunidad()->associate($comunidad)->delete();
    }
    
}
