<?php
namespace App\Http\Controllers;
use App\Registro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreGrupoRequest;
use Illuminate\Support\Facades\Auth;
class PaginaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$request->user()->authorizeRoles(['user', 'admin']);
        $usuarios = Registro::all();
        if (Auth::check()) {
            if(count($usuarios) >= 1){
                return view('grupos.index', compact('usuarios'));
            }else{
                return view('common.nothing', compact('usuarios'));
            }
        } return view('index');
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //$request->user()->authorizeRoles(['user', 'admin']);
        if (Auth::check()) {
            return view('grupos.create');
        } return view('index');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGrupoRequest $request)
    {
        $ingresar = new Registro();
            if($request->hasfile('avatar'))
                {
                    $file = $request->file('avatar');
                    $name = time().$file->getClientOriginalName();
                    $file->move(public_path().'/images/', $name);
                }
                
        $ingresar->name = $request->input('name');
        $ingresar->avatar = $name;
        $ingresar->slug = $request->input('slug');
        $ingresar->descript = $request->input('descript');
        $ingresar->save();
        if (Auth::check()) {
            return redirect()->route('grupos.index')->with('status','Datos Creados Correctamente');
        } return view('index');
        
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Registro $mostrar, $slug)
    {
        $mostrar = Registro::where('slug','=',$slug)->firstOrFail();
        //dd($mostrar);
        if (Auth::check()) {
            return view('grupos.show', compact('mostrar'));
        } return view('index');
        
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Registro $mostrar, $slug)
    {
        $mostrar = Registro::where('slug','=',$slug)->firstOrFail();
        if (Auth::check()) {
            return view('grupos.edit', compact('mostrar'));
        } return view('index');
        
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Registro $mostrar, $slug)
    {
        $mostrar = Registro::where('slug','=',$slug)->firstOrFail();
        $mostrar->fill($request->except('avatar'));
        if($request->hasfile('avatar'))
        {
            $file = $request->file('avatar');
            $name = time().$file->getClientOriginalName();
            $mostrar->avatar = $name;
            $file->move(public_path().'/images/', $name);
        }
        $mostrar->save();
        if (Auth::check()) {
            return redirect()->route('grupos.show', [$mostrar])->with('status','Datos Actualizados Correctamente');
        } return view('index');
        
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Registro $mostrar, $id)
    {
        $mostrar = Registro::findOrFail($id);
        $file_path = public_path().'/images/'.$mostrar->avatar;
        \File::delete($file_path);
        $mostrar->delete();
        if (Auth::check()) {
            return redirect()->route('grupos.index')->with('status','Datos Eliminados Correctamente');
        } return view('index');
        
    }
}