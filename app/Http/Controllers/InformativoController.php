<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InformativoController extends Controller
{
    public function index(Request $request){
    	if($request ->ajax()){
    		return response()->json ([
    			[ 'id' => 1, 'name' => 'nada 0', 'description' => 'bla bla bla' ],
                [ 'id' => 2, 'name' => 'nada 1', 'description' => 'ble ble ble' ],
                [ 'id' => 3, 'name' => 'nada 2', 'description' => 'bfu bfu bfu' ],
    		], 200);
    	}
    	return view('info.index');
    }
    public function store(Request $request){
    	if($request->ajax()){
    		$info = new Info();
    		$info->name = $request->input('name');
    		$info->description = $request->input('description');
    		$infor->save();

    		return response()->json([
    			"message" => "Información Creada."
    		], 200);
    	}
    }
}
