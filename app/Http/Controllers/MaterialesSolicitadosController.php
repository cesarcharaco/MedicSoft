<?php

namespace App\Http\Controllers;

use App\MaterialesSolicitados;
use Illuminate\Http\Request;
use App\Materiales;
class MaterialesSolicitadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $num=0;
        $fecha=date('Y-m-d');
        $mat=MaterialesSolicitados::get()->last();
        //dd($mat->id);
        $materiales=MaterialesSolicitados::select('id')->select('fecha')->groupBy('fecha')->get();
       
        //dd($materiales);
        return view('admin.solicitud_materiales.index', compact('num','materiales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $materiales=Materiales::all();
        $materiales2=Materiales::all();

        return view('admin.solicitud_materiales.create',compact('materiales','materiales2'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $fecha=date('Y-m-d');
        $solicitudes=MaterialesSolicitados::where('fecha',$fecha)->get();

        if (count($solicitudes)>0) {
            flash("DISCULPE, NO PUEDE REALIZAR MAS DE UNA SOLICITUD POR DÍA", 'error'); 

        return redirect()->back()->withInput();
        } else {
            //verificando que la cantidad solicitada no sea mayor a la disponible
        $cont=0;
        for ($i=1; $i <count($request->cantidad) ; $i++) { 
            $material=Materiales::find($request->id_material[$i]);
            
            if ($request->cantidad[$i]>$material->stock_max) {
                $cont++;
            }
        }
        if ($cont>0) {
            flash("DISCULPE, HA INGRESADO UNA CANTIDAD PARA ALGÚN MATERIAL QUE SUPERA EL STOCK MÁXIMO DEL MISMO", 'error'); 

            return redirect()->back()->withInput();
        } else {
            for ($i=1; $i <count($request->cantidad) ; $i++) { 
                $solicitud=MaterialesSolicitados::create(['fecha' => $fecha,
                    'id_material' => $request->id_material[$i],
                    'cantidad' => $request->cantidad[$i]]);
            }
            flash("SOLICITUD DE MATERIALES REALIZADA CON ÉXITO", 'success'); 

            return redirect()->route('solicitud_materiales.index');
        }
        
        }
        
        
    }

    public function vermateriales($id)
    {
        $num=0;
        //dd($id);
        $solicitud=MaterialesSolicitados::where('fecha',$id)->get();
        //dd($solicitud);
        //dd($pedidos_oficinas->load('materiales'));
        $fecha=$id;
        return view('admin.solicitud_materiales.vermateriales', compact('num','solicitud','fecha'));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\MaterialesSolicitados  $materialesSolicitados
     * @return \Illuminate\Http\Response
     */
    public function show(MaterialesSolicitados $materialesSolicitados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MaterialesSolicitados  $materialesSolicitados
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       //dd($id);
        $solicitud=MaterialesSolicitados::where('fecha',$id)->get();
        //dd($solicitud);
        $materiales=Materiales::all();
        $materiales2=Materiales::all();
        $fecha=$id;
        return view('admin.solicitud_materiales.edit', compact('solicitud','materiales','materiales2','fecha'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MaterialesSolicitados  $materialesSolicitados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //dd($request->all());
        
        $solicitudes=MaterialesSolicitados::where('fecha',$request->fecha)->get();

        
            //verificando que la cantidad solicitada no sea mayor a la disponible
        $cont=0;
        for ($i=1; $i <count($request->cantidad) ; $i++) { 
            $material=Materiales::find($request->id_material[$i]);
            
            if ($request->cantidad[$i]>$material->stock_max) {
                $cont++;
            }
        }
        if ($cont>0) {
            flash("DISCULPE, HA INGRESADO UNA CANTIDAD PARA ALGÚN MATERIAL QUE SUPERA EL STOCK MÁXIMO DEL MISMO", 'error'); 

            return redirect()->back()->withInput();
        } else {
            $eliminar=\DB::select("DELETE FROM materiales_solicitados WHERE fecha='".$request->fecha."'");

            for ($i=1; $i <count($request->cantidad) ; $i++) { 
                $solicitud=MaterialesSolicitados::create(['fecha' => $request->fecha,
                    'id_material' => $request->id_material[$i],
                    'cantidad' => $request->cantidad[$i]]);
            }
            flash("SOLICITUD DE MATERIALES ACTUALIZADA CON ÉXITO", 'success'); 

            return redirect()->route('solicitud_materiales.index');
        }
        
        
    }

    public function buscarsolicitudes($fecha)
    {
        //dd($fecha);
        $solicitud=MaterialesSolicitados::where('fecha',$fecha)->get();
        $num=0;

        $dompdf = \PDF::loadView('admin.pdfs.reportes.reportesolicitudmateriales', ['num' => $num,'solicitud' => $solicitud,'fecha' => $fecha])->setPaper('a4', 'portrait');

                    return $dompdf->stream('Solicitud_de_Materiales_'.$fecha.'.pdf'); 
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MaterialesSolicitados  $materialesSolicitados
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //dd($request->all());
         $eliminar=\DB::select("DELETE FROM materiales_solicitados WHERE fecha='".$request->id."'");
         flash("SOLICITUD DE MATERIALES ELIMINADA CON ÉXITO", 'success'); 

            return redirect()->route('solicitud_materiales.index');
    }
}
