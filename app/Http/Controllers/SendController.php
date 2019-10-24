<?php

namespace App\Http\Controllers;

use App\User;
use App\Send;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;

class SendController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:mensajeria.index')->only(['index']);
        $this->middleware('permission:mensajeria.create')->only(['create','store']);
        $this->middleware('permission:mensajeria.show')->only(['show']);
        $this->middleware('permission:mensajeria.destroy')->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $correos = Send::where('recipient_id', '=', auth()->id())
            ->orderBy('created_at', 'DESC')
            ->paginate(8);
        return view('mensajeria.index', compact('correos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('id', '!=', auth()->id())->get();
        return view('mensajeria.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $correo = new Send();
            $correo->sender_id = auth()->id();
            $correo->name = $request->input('name');
            $correo->recipient_id = $request->input('recipient_id');
            $correo->body = $request->input('body');
            $correo->save();

        return redirect()->route('mensajeria.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Send $correo, $id)
    {
        $correo = Send::find($id);
        return view('mensajeria.mailbox', compact('correo'));
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Send $correo, $id)
    {
        $correo = Send::find($id);
        $correo->delete();

        return redirect()->route('mensajeria.index');
    }
}
