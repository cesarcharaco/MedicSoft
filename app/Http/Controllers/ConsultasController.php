<?php

namespace App\Http\Controllers;

use App\Consultas;
use App\Pacientes;
use App\Pacientes_nt;
use App\Tipo_consulta;
use App\ConsultasMontos;
use Illuminate\Http\Request;
use App\Http\Requests\ConsultasRequest;
use Laracasts\Flash\flash;
use Excel;

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
        $pacientesnt=Pacientes_nt::all();
        $tipoconsultas=Tipo_consulta::all();

        return view('admin.consultas.create', compact('pacientesnt','tipoconsultas'));
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

            $consulta=Consultas::where('id_consultamonto',$consultamonto->id)->where('id_pacientent',$request->id_pacientent)->where('fecha',$fecha)->get();
            if (count($consulta)==1) {
                flash("DISCULPE, EL PACIENTE YA SE ENCUENTRA PARA HOY REGISTRADO PARA ESTA CONSULTA!", 'error'); 
                return redirect()->route('consultas.create')->withInput();
            } else {
                $consulta=Consultas::where('id_pacientent',$request->id_pacientent)->where('fecha',$fecha)->get();

                if (count($consulta)>=2) {
                    flash("DISCULPE, EL PACIENTE YA LLEGÓ AL LÍMITE DIARIO DE CONSULTAS!", 'error'); 
                    return redirect()->route('consultas.create')->withInput();
                } else {
                    //verificando posicion
                    $consulta=Consultas::where('id_consultamonto',$consultamonto->id)->where('fecha',$fecha)->get()->last();
                        
                        if (count($consulta)>0) {
                            $posicion=$consulta->posicion;
                            //falta la busqueda de cuantas veces al mes se ha visto por esta consulta
                            $consulta= new Consultas();
                            $consulta->id_pacientent=$request->id_pacientent;
                            $consulta->id_consultamonto=$consultamonto->id;
                            $consulta->fecha=$fecha;
                            $consulta->posicion=$posicion+1;
                            $consulta->save();    
                            } else {
                                //falta la busqueda de cuantas veces al mes se ha visto por esta consulta
                            $consulta= new Consultas();
                            $consulta->id_pacientent=$request->id_pacientent;
                            $consulta->id_consultamonto=$consultamonto->id;
                            $consulta->fecha=$fecha;
                            $consulta->posicion=1;
                            $consulta->save();
                            }
                                                           
                            flash("EL REGISTRO HA SIDO EXITOSO!", 'success'); 
                            return redirect()->route('consultas.index');
                }
                
            }
            
        }
        
    }
    public function mostrarpacientes(Request $request)
    {
        $fecha=date('Y-m-d');
        $consultas=Consultas::select('id_pacientent')->where('fecha',$fecha)->groupBy('id_pacientent')->get();
        $num=0;

        return View('admin.consultas.pacientes',compact('consultas','num'));
        
    }

    public function verconsultas($id)
    {
        $fecha=date('Y-m-d');
        $consultas=Consultas::where('id_pacientent',$id)->where('fecha',$fecha)->get();
        $pacientent=Pacientes_nt::find($id);
        $num=0;
        $total=0;

        return View('admin.consultas.verconsultas',compact('consultas','num','pacientent','total'));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Consultas  $consultas
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        
        $fecha=date('Y-m-d');
        
        $consultas=Consultas::where('fecha','<>',$fecha)->get();
        
        $num=0;

        return view('admin.consultas.show', compact('consultas','num'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Consultas  $consultas
     * @return \Illuminate\Http\Response
     */

    public function vistas(Request $request)
    {
        $consulta=Consultas::find($request->id);
        $consulta->estado="Vista";
        $consulta->diagnostico=$request->diagnostico;
        $consulta->save();

        flash("LA CONSULTA SE HA MARCADO COMO VISTA!", 'success'); 
        return redirect()->route('consultas.index');
        
    }
    
    public function edit($id)
    {
        $consulta=Consultas::find($id);
        //dd($consulta);
        $pacientent=Pacientes_nt::find($consulta->id_pacientent);
        $tipoconsultas=Tipo_consulta::all();

        return view('admin.consultas.edit', compact('consulta','tipoconsultas','pacientent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Consultas  $consultas
     * @return \Illuminate\Http\Response
     */
    public function update(ConsultasRequest $request,  $id)
    {
        //dd($request->all());
        $fecha=date('Y-m-d');
        $consultamonto=ConsultasMontos::where('id_tipoconsulta',$request->id_tipoconsulta)->get()->last();
        if (count($consultamonto)==0) {
            flash("DISCULPE, NO SE PUEDE REGISTRAR LA CONSULTA YA QUE LA MISMA AÚN SE ENCUENTRA SIN UN MONTO DE PAGO!", 'error'); 
            return redirect()->route('consultas.edit',$id)->withInput();
        } else {

            $consulta=Consultas::where('id_consultamonto',$consultamonto->id)->where('id_pacientent',$request->id_pacientent)->where('fecha',$fecha)->get();
            if (count($consulta)==1) {
                flash("DISCULPE, EL PACIENTE YA SE ENCUENTRA PARA HOY REGISTRADO PARA ESTA CONSULTA!", 'warning'); 
                return redirect()->route('consultas.edit',$id)->withInput();
            } else {
                $consulta=Consultas::where('id_pacientent',$request->id_pacientent)->where('fecha',$fecha)->get();
                if (count($consulta)>0 AND count($consulta)<3) {
                    flash("DISCULPE, EL PACIENTE YA LLEGÓ AL LÍMITE DIARIO DE CONSULTAS!", 'error'); 
                    return redirect()->route('consultas.edit',$id)->withInput();
                } else {
                    //verificando fecha
                    $consulta=Consultas::find($id);
                    if ($consulta->fecha!=$fecha AND $consulta->estado=="Vista") {
                        flash("DISCULPE, EL PACIENTE YA FUE VISTO POR ESTA CONSULTA EN OTRA FECHA, NO SE PUEDE ACTUALIZAR!", 'error'); 
                    return redirect()->route('consultas.edit',$id)->withInput();
                    } else {
                        if ($consulta->fecha==$fecha AND $consulta->estado=="Vista") {
                            flash("DISCULPE, EL PACIENTE YA FUE VISTO POR ESTA CONSULTA HOY, NO SE PUEDE ACTUALIZAR!", 'error'); 
                    return redirect()->route('consultas.edit',$id)->withInput();
                        } else {
                            
                    //verificando posicion
                        $consulta=Consultas::where('id_consultamonto',$consultamonto->id)->where('fecha',$fecha)->get()->last();
                        
                        if (count($consulta)>0) {
                            $posicion=$consulta->posicion;
                            //falta la busqueda de cuantas veces al mes se ha visto por esta consulta
                            $consulta= Consultas::find($id);
                            $consulta->id_consultamonto=$consultamonto->id;
                            $consulta->posicion=$posicion+1;
                            $consulta->save();    
                            } else {
                                //falta la busqueda de cuantas veces al mes se ha visto por esta consulta
                            $consulta= Consultas::find($id);
                            $consulta->id_consultamonto=$consultamonto->id;
                            $consulta->posicion=1;
                            $consulta->save();
                            }
                                                           
                            flash("EL REGISTRO HA SIDO EXITOSO!", 'success'); 
                            return redirect()->route('consultas.index');        
                        }
                        
                    }
                    
                }
                
            }
            
        }
        
    }
    public function reportediario()
    {
        $fecha=date('Y-m-d');
        $tipoconsultas=Tipo_consulta::all();
        $consultas=Consultas::select('id_pacientent')->where('fecha',$fecha)->where('estado','Vista')->groupBy('id_pacientent')->get();

        $vistas=Consultas::where('fecha',$fecha)->where('estado','Vista')->get();

        if (count($vistas)>0 AND count($consultas) >0) {
            
            Excel::create("Reporte Diario", function ($excel) use ($tipoconsultas,$consultas,$vistas) {

                $excel->setTitle("Reporte Diario");
                $excel->sheet("Pestaña 1", function ($sheet) use ($tipoconsultas,$consultas,$vistas) 
                {
                    $sheet->loadView('admin.reportes.excel.diario')->with('tipoconsultas', $tipoconsultas)->with('consultas',$consultas)->with('vistas',$vistas);
                });

            })->download('xlsx');
        } else {
            flash("NO EXISTEN CONSULTAS PARA EL DÍA DE HOY QUE HALLAN SIDO MARCADAS COMO VISTAS!", 'success'); 
            return redirect()->route('consultas.index');
        }
        
    }

    public function reportediariovistas($value='')
    {
        $fecha=date('Y-m-d');
        $tipoconsultas=Tipo_consulta::all();
        $consultas=Consultas::select('id_pacientent')->where('fecha',$fecha)->where('estado','Vista')->groupBy('id_pacientent')->get();

        $vistas=Consultas::where('fecha',$fecha)->where('estado','Vista')->get();

        if (count($vistas)>0 AND count($consultas) >0) {
            
            return view('admin.reportes.diario', compact('tipoconsultas','consultas','vistas'));
        } else {
            flash("NO EXISTEN CONSULTAS PARA EL DÍA DE HOY QUE HALLAN SIDO MARCADAS COMO VISTAS!", 'success'); 
            return redirect()->route('consultas.index');
        }
    }

    public function editardiagnostico(Request $request)
    {
        dd($request->all());
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Consultas  $consultas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $consulta=Consultas::find($request->id);

        //verificar si no se encuentra en algun otro registro

        if ($consulta->delete()) {
            flash("LA CONSULTA HA SIDO ELIMINADA CON EXITO!", 'success'); 
        } else {
            flash("DISCULPE, LA CONSULTA NO PUDO SER ELIMINADA!", 'error'); 
            
        }
        return redirect()->route('consultas.index');        
        
    }
}
