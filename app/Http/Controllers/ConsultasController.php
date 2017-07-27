<?php

namespace App\Http\Controllers;

use App\Consultas;
use App\Pacientes;
use App\Tipo_consulta;
use App\ConsultasMontos;
use Illuminate\Http\Request;
use App\Http\Requests\ConsultasRequest;
use Laracasts\Flash\flash;

class ConsultasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fecha=date('Y-m-d');
        $consultas=Consultas::where('fecha',$fecha)->get();
        $num=0;

        return view('admin.consultas.index', compact('consultas','num'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pacientes=Pacientes::all();
        $tipoconsultas=Tipo_consulta::all();

        return view('admin.consultas.create', compact('pacientes','tipoconsultas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ConsultasRequest $request)
    {
        //dd($request->all());
        $fecha=date('Y-m-d');
        $consultamonto=ConsultasMontos::where('id_tipoconsulta',$request->id_tipoconsulta)->get()->last();
        if (count($consultamonto)==0) {
            flash("DISCULPE, NO SE PUEDE REGISTRAR LA CONSULTA YA QUE LA MISMA AÚN SE ENCUENTRA SIN UN MONTO DE PAGO!", 'error'); 
            return redirect()->route('consultas.create')->withInput();
        } else {

            $consulta=Consultas::where('id_consultamonto',$consultamonto->id)->where('id_paciente',$request->id_paciente)->where('fecha',$fecha)->get();
            if (count($consulta)==1) {
                flash("DISCULPE, EL PACIENTE YA SE ENCUENTRA PARA HOY REGISTRADO PARA ESTA CONSULTA!", 'error'); 
                return redirect()->route('consultas.create')->withInput();
            } else {
                $consulta=Consultas::where('id_paciente',$request->id_paciente)->where('fecha',$fecha)->get();
                if (count($consulta)>0 AND count($consulta)<3) {
                    flash("DISCULPE, EL PACIENTE YA LLEGÓ AL LÍMITE DIARIO DE CONSULTAS!", 'error'); 
                    return redirect()->route('consultas.create')->withInput();
                } else {
                    //falta la busqueda de cuantas veces al mes se ha visto por esta consulta
                    $consulta= new Consultas();
                    $consulta->id_paciente=$request->id_paciente;
                    $consulta->id_consultamonto=$consultamonto->id;
                    $consulta->fecha=$fecha;
                    $consulta->save();
                    
                    flash("EL REGISTRO HA SIDO EXITOSO!", 'success'); 
                    return redirect()->route('consultas.index');
                }
                
            }
            
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Consultas  $consultas
     * @return \Illuminate\Http\Response
     */
    public function show(Consultas $consultas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Consultas  $consultas
     * @return \Illuminate\Http\Response
     */
    public function edit(Consultas $consultas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Consultas  $consultas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Consultas $consultas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Consultas  $consultas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consultas $consultas)
    {
        //
    }
}
