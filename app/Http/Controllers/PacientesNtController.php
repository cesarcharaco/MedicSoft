<?php

namespace App\Http\Controllers;

use App\Pacientes_nt;
use Illuminate\Http\Request;
use App\Http\Requests\PacientesNtRequest;
use Laracasts\Flash\flash;
use App\Pacientes;
class PacientesNtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes_nt=Pacientes_nt::where('titular','No')->get();
        $num=0;
        return View('admin.pacientes_nt.index',compact('pacientes_nt','num'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $pacientes=Pacientes::all();
        
       return View('admin.pacientes_nt.create',compact('pacientes'));
    }
/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PacientesNtRequest $request)
    {
        
        $paciente_nt=Pacientes_nt::where('cedula',$request->cedula)->first();

        if (count($paciente_nt)>0) {
            flash("LA CÉDULA YA HA SIDO REGISTRADA!", 'error'); 
            return redirect()->route('pacientes_nt.create')->withInput();
        } else {
           //cosultando cuantos pacientes tiene el titular relacionados
            $paciente=Pacientes_nt::where('id_paciente',$request->id_paciente)->get();
            if (count($paciente)==5) {
                flash("DISCULPE, EL TITULAR SELECCIONADO YA TIENE 5 BENEFICIARIOS REGISTRADOS!", 'error'); 
                return redirect()->route('pacientes_nt.create')->withInput();
            } else {
                if ($request->parentesco!=="Hijo(a)") {
                    //verificando si tiene un padre, madre o esposo(a) ya registrado
                    $buscando=Pacientes_nt::where('parentesco',$request->parentesco)->where('id_paciente',$request->id_paciente)->get();           
                    $cuanto=count($buscando);
                } else {
                    $cuanto=0;
                }
                if ($cuanto>0) {
                     flash("DISCULPE, YA EXISTE UN(A) ".$request->parentesco." REGISTRADO PARA EL TITULAR SELECCIONADO, VERIFIQUE LA BIEN LA INFORMACIÓN REGISTRADA!", 'error'); 
                return redirect()->route('pacientes_nt.create')->withInput();
                } else {
                
                
                $paciente_nt=Pacientes_nt::create(['nombres' => $request->nombres,
                                         'apellidos' => $request->apellidos,
                                         'nacionalidad' => $request->nacionalidad,
                                         'cedula' => $request->cedula,
                                         'codigo_telf' => $request->codigo_telf,
                                         'telefono' => $request->telefono,
                                         'direccion' => $request->direccion,
                                         'edad' => $request->edad,
                                         'genero' => $request->genero,
                                         'titular' => 'No',
                                         'parentesco' => $request->parentesco,
                                         'id_paciente' => $request->id_paciente]);
                flash("EL REGISTRO HA SIDO EXITOSO!", 'success');     
                return redirect()->route('pacientes_nt.index');       
                }
                
                
            }
        }

        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paciente_nt=Pacientes_nt::find($id);
        $pacientes=Pacientes::all();

        return View('admin.pacientes_nt.edit',compact('paciente_nt','pacientes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PacientesNtRequest $request, $id)
    {
        $paciente_nt=Pacientes_nt::where('cedula',$request->cedula)->where('id','<>',$id)->first();

        if (count($paciente_nt)>0) {
            flash("LA CÉDULA YA HA SIDO REGISTRADA!", 'error'); 
            return redirect()->route('pacientes_nt.edit')->withInput();
        } else {
           if ($request->parentesco!=="Hijo(a)") {
                    //verificando si tiene un padre, madre o esposo(a) ya registrado
                    $buscando=Pacientes_nt::where('parentesco',$request->parentesco)->where('id_paciente',$request->id_paciente)->where('id','<>',$id)->get();           
                    $cuanto=count($buscando);
                } else {
                    $cuanto=0;
                }
                if ($cuanto>0) {
                     flash("DISCULPE, YA EXISTE UN(A) ".$request->parentesco." REGISTRADO PARA EL TITULAR SELECCIONADO, VERIFIQUE LA BIEN LA INFORMACIÓN REGISTRADA!", 'error'); 
                return redirect()->route('pacientes_nt.create')->withInput();
                } else {
                
            $paciente_nt=Pacientes_nt::find($id);
            $paciente_nt->nombres=$request->nombres;
            $paciente_nt->apellidos=$request->apellidos;
            $paciente_nt->nacionalidad=$request->nacionalidad;
            $paciente_nt->cedula=$request->cedula;
            $paciente_nt->codigo_telf=$request->codigo_telf;
            $paciente_nt->telefono=$request->telefono;
            $paciente_nt->direccion=$request->direccion;
            $paciente_nt->id_paciente=$request->id_paciente;
            $paciente_nt->edad=$request->edad;
            $paciente_nt->genero=$request->genero;
            $paciente_nt->parentesco=$request->parentesco;
            $paciente_nt->save();

            flash("LA ACTUALIZACIÓN HA SIDO EXITOSA!", 'success'); 
            return redirect()->route('pacientes_nt.index');
            }
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        

        $paciente_nt=Pacientes_nt::find($request->id);
        if ($paciente_nt->consultas->exists()) {
            flash("DISCULPE, NO SE PUEDE ELIMINAR YA QUE SE ENCUENTRA EN REGISTROS DE CONSULTAS!", 'error'); 
        } else {
            if ($paciente_nt->delete()) {
             flash("LA ELIMINACIÓN DEL REGISTRO HA SIDO EXITOSA!", 'success'); 
                
            } else {
             flash("DISCULPE, LA ELIMINACIÓN DEL REGISTRO NO HA SIDO EXITOSA!", 'error'); 
            }
        }
        
        
        return redirect()->route('pacientes_nt.index');
    }
}
