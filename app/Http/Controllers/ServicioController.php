<?php

namespace App\Http\Controllers;

use DB;
use App\Servicio;
use Illuminate\Http\Request;
use App\Municipios;
use App\Chofer;
use Illuminate\Support\Facades\Auth;


class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $redirectTo = '/';

    public function index()
    {
        return view('viaje.index');
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->middleware('auth');
        $municipios = Municipios::all();
        return view('viaje.solicitar',['municipios' => $municipios]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'tipo' => 'required|digits_between:0,1',
            'hora_contratada' => 'required|date_format:H:i',
            'fecha_contratada' => 'required|date_format:Y-m-d',
            'direccion_inicio_exacta' => 'required|string|min:6|max:255',
            'municipios_id_inicio' => 'required|integer',
            'direccion_fin_exacta' => 'required_if:tipo,==,0|string|min:6|max:255',
            'kilometraje' => 'required_if:tipo,==,0|integer|min:1|max:4000',
            'horas' => 'required_if:tipo,==,1|integer|min:0|max:12',
            'minutos' => 'required_if:tipo,==,1|integer|min:0|max:59',
            'municipios_id_fin' => 'required_if:tipo,==,0|integer',

        ]);

        if($request->tipo==1)
        {
            $request['horas_alquiler']=$request->horas+$request->minutos/60;

        }
        
       
        
        $request['clientes_clientes_id']=Auth::user()->id;
        
        //tengo que meter valoraciones
        $servicio = Servicio::create($request->except("_token","horas","minutos"));
        $servicio->save();
        
        return redirect()->route("chofers-disponibles",['servicioId' => $servicio->id]);

    }

    public function elegirChofer($servicioId)
    {
        $servicio = Servicio::find($servicioId);
        if($servicio->tipo==1)
        {
            $arrayChofersId = DB::select("CALL chofers_disponibles_hora('$servicio->fecha_contratada', '$servicio->hora_contratada', '$servicio->municipios_id_inicio');");

        }
        else{
            $arrayChofersId = DB::select("CALL chofers_disponibles_kilometros('$servicio->fecha_contratada', '$servicio->hora_contratada', '$servicio->municipios_id_inicio');");

        }
        
        $choferIds = collect();
        foreach($arrayChofersId as $choferTemporalId)
        {
            $choferIds->push($choferTemporalId->chofers_id);
        }
        $chofers = chofer::findorfail($choferIds);
        
        return view("viaje.chofer",['chofers' => $chofers, 'servicio' => $servicio]);
    }


    public function chofer($servicioId, $choferId)
    {
        $servicio = Servicio::find($servicioId);
        $chofer = Chofer::find($choferId);

        if($servicio->tipo==1)
        {
            $servicio->precio = $chofer->precio_hora *  $servicio->horas_alquiler;
        }
        else{
            $servicio->precio = $chofer->precio_kilometro * $servicio->kilometraje;
        }
        $servicio->chofers_chofers_id = $chofer->chofers_id;
        $servicio->save();
        return redirect()->route("pagar-viaje",['servicioId' => $servicio->id]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function show(Servicio $servicio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function edit(Servicio $servicio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Servicio $servicio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Servicio $servicio)
    {
        //
    }
}
