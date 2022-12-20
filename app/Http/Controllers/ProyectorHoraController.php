<?php

namespace App\Http\Controllers;

use App\Models\Proyector_hora;
use App\Models\Proyectores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ProyectorHoraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Redirect::route('admin.proyectores.index');
    }

    public function getReservas($proyector_id){
        $reservas = Proyector_hora::where('baja',0)->where('proyector_id',$proyector_id)->get();
        return $reservas;
    }

    public function getApartados(){
        $apartados = Proyector_hora::with('user','proyector')->where('baja',0)->get();
        return $apartados;
    }

    public function cambiarEstado($apartado_id,$estado){
        $apartado = Proyector_hora::find($apartado_id);
        $apartado->estado = $estado;
        $apartado->save();        
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
        $user = Auth::user();
        $res = $request->validate([
            'proyector_id' => 'required',
            'horario' => 'required'
        ]);
        Proyector_hora::create([
            'user_id' => $user->id,
            'proyector_id' => $request->proyector_id,
            'horario' => $request->horario,
        ]);

        return $res;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proyector_hora  $proyector_hora
     * @return \Illuminate\Http\Response
     */
    public function show(Proyector_hora $proyector_hora)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proyector_hora  $proyector_hora
     * @return \Illuminate\Http\Response
     */
    public function edit(Proyector_hora $proyector_hora)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proyector_hora  $proyector_hora
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proyector_hora $proyector_hora)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proyector_hora  $proyector_hora
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proyector_hora $proyector_hora)
    {
        //
    }
}
