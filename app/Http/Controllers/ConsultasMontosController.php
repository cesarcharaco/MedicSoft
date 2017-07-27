<?php

namespace App\Http\Controllers;

use App\ConsultasMontos;
use App\Tipo_consulta;
use Illuminate\Http\Request;
use App\Http\Requests\ConsultasMontosRequest;
use Laracasts\Flash\flash;
class ConsultasMontosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consultasmontos=ConsultasMontos::all();
        $num=0;

        return view('admin.consultasmontos.index', compact('consultasmontos','num'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipoconsultas=Tipo_consulta::all();
        

        return view('admin.consultasmontos.create', compact('tipoconsultas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ConsultasMontosRequest $request)
    {

        $fecha=date('Y-m-d');
        $consultasmonto=ConsultasMontos::where('id_tipoconsulta',$request->id_tipoconsulta)->where('fecha',$fecha)->get();
        if (count($consultasmonto)>0) {

            flash('NO PUEDE REGISTRAR MONTOS A LA MISMA CONSULTA EL MISMO DIA, DEBE ACTUALIZAR EL MONTO!', 'warning'); 
            return redirect()->route('consultasmontos.create')->withInput();
        } else {
            
            if ($request->monto<0) {
                flash('EL MONTO NO PUEDE SER MENOR QUE CERO (0) BSF.!', 'error'); 
                return redirect()->route('consultasmontos.create')->withInput();
            } else {
            
                $consultasmontos=ConsultasMontos::create(['id_tipoconsulta' => $request->id_tipoconsulta,
                    'monto' => $request->monto,
                    'fecha' => $fecha]);
                flash('EL REGISTRO HA SIDO EXITOSO!', 'success'); 
                return redirect()->route('consultasmontos.index');
            }
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ConsultasMontos  $consultasMontos
     * @return \Illuminate\Http\Response
     */
    public function show(ConsultasMontos $consultasMontos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ConsultasMontos  $consultasMontos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $consultasmonto=ConsultasMontos::find($id);
       
        return view('admin.consultasmontos.edit', compact('consultasmonto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ConsultasMontos  $consultasMontos
     * @return \Illuminate\Http\Response
     */
    public function update(ConsultasMontosRequest $request,  $id)
    {
        if ($request->monto<0) {
            flash("EL MONTO NO PUEDE SER MENOR QUE CERO (0) BSF.!", 'error'); 
            return redirect()->route('consultasmontos.create')->withInput();
        } else {
            
            $consultasmonto=ConsultasMontos::find($id);
            $consultasmonto->monto= $request->monto;
            $consultasmonto->save();
            flash("EL REGISTRO HA SIDO EXITOSO!", 'success'); 
            return redirect()->route('consultasmontos.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ConsultasMontos  $consultasMontos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //verificar que dicho monto no esta relacionado en ninguna tabla
        $consultasmonto=ConsultasMontos::find($request->id);
        if ($consultasmonto->delete()) {
            flash("LA ELIMINACIÓN HA SIDO EXITOSA!", 'success'); 
        } else {
            flash("DISCULPE, LA ELIMINACIÓN NO HA SIDO EXITOSA!", 'error'); 
        }
        
        return redirect()->route('consultasmontos.index');

    }
}
