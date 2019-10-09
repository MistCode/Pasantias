<?php

namespace App\Http\Controllers;

use App\Comunidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreComunidadesRequest;
use Illuminate\Support\Facades\Auth;

class ComunidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$request->user()->authorizeRoles(['user', 'admin']);
        $usuarios = Comunidad::all();
        if (Auth::check()) {
            if(count($usuarios) >= 1){
                return view('comunidades.index', compact('usuarios'));
            }else{
                return view('common.nothing-comunidad', compact('usuarios'));
            }
        } return view('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
            return view('comunidades.create');
        } return view('index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreComunidadesRequest $request)
    {
        $dat = new Comunidad();
            if($request->hasfile('avatar'))
                {
                    $file = $request->file('avatar');
                    $name = time().$file->getClientOriginalName();
                    $file->move(public_path().'/images/comun/', $name);
                }
        
        $dat->name = $request->input('name');
        $dat->avatar = $name;
        $dat->slug = $request->input('slug');
        $dat->describir = $request->input('describir');
        $dat->save();

        if (Auth::check()) {
            return redirect()->route('comunidades.index');
        } return view('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Comunidad $dat, $slug)
    {
        $dat = Comunidad::where('slug','=',$slug)->firstOrFail();
        if (Auth::check()) {
            return view('comunidades.show', compact('dat'));
        } return view('index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comunidad $dat, $slug)
    {
        $dat = Comunidad::where('slug','=',$slug)->firstOrFail();
        if (Auth::check()) {
            return view('comunidades.edit', compact('dat'));
        } return view('index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comunidad $dat, $slug)
    {
        $dat = Comunidad::where('slug','=',$slug)->firstOrFail();
        $dat->fill($request->except('avatar'));
        if($request->hasfile('avatar'))
        {
            $file = $request->file('avatar');
            $name = time().$file->getClientOriginalName();
            $dat->avatar = $name;
            $file->move(public_path().'/images/comun/', $name);
        }
        $dat->save();
        if (Auth::check()) {
            return redirect()->route('comunidades.index');
        } return view('index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comunidad $dat, $id)
    {
        $dat = Comunidad::findOrFail($id);
        $file_path = public_path().'/images/comun/'.$dat->avatar;
        \File::delete($file_path);
        $dat->delete();
        if (Auth::check()) {
            return redirect()->route('comunidades.index');
        } return view('index');
    }
}
