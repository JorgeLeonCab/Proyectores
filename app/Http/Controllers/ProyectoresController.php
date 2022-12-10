<?php

namespace App\Http\Controllers;

use App\Models\Proyectores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ProyectoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
        $this->usuario_loggeado = Auth::user();
    }
    
    public function index()
    {
        $user = Auth::user();
        return Inertia::render("proyectores_profesor/index");
    }

    public function getProyectores(){
        $proyectores = Proyectores::where("baja",0)->get();

        return $proyectores;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proyectores  $proyectores
     * @return \Illuminate\Http\Response
     */
    public function show(Proyectores $proyectores)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proyectores  $proyectores
     * @return \Illuminate\Http\Response
     */
    public function edit(Proyectores $proyectores)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proyectores  $proyectores
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proyectores $proyectores)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proyectores  $proyectores
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proyectores $proyectores)
    {
        //
    }
}
