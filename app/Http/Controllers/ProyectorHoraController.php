<?php

namespace App\Http\Controllers;

use App\Models\Proyector_hora;
use App\Models\Proyectores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProyectorHoraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function getReservas($proyector_id){
        $reservas = Proyector_hora::where('baja',0)->where('proyector_id',$proyector_id)->get();
        return $reservas;
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
