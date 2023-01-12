<?php

namespace App\Http\Controllers;

use App\Models\Cotizacion_c;
use App\Models\Cotizacion_d;
use App\Models\Producto;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CotizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::all();
        // $cotizacion_c = Cotizacion_c::all();
        $cotizacion_c = Cotizacion_c::select('cotizacion_c.*', 'users.nombre as nombre', 'users.apellido as apellido', DB::raw('(select sum(cantidad) from cotizacion_d where cotizacion_id = cotizacion_c.id) as cantidad'))
        ->join('users', 'cotizacion_c.usuario_id', '=', 'users.id')
        ->get(); 

        return view('cotizacion.index_cotizacion',compact('productos','cotizacion_c'));
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
        dd($request->input->all());
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function guardar(Request $request){
        // dd($request->all());

        
        
        #hacemos la cotizacion_c
        $cotizacion_c = new Cotizacion_c();
        $cotizacion_c->usuario_id = $request->user_id;
        $cotizacion_c->total_bruto = $request->total_bruto;
        $cotizacion_c->fecha_emision = Carbon::now(); 
        $cotizacion_c->save(); 
 
        $matriz = json_decode($request->productos,true);
        foreach($matriz as $elemento){
            $sku = $elemento[0];
            $precio = $elemento[1];
            $cantidad = $elemento[2];

            #objetos cotizacion_d
            $cotizacion_d = new Cotizacion_d();
            $cotizacion_d->cotizacion_id = $cotizacion_c->id;
            $cotizacion_d->producto_sku = $sku;
            $cotizacion_d->cantidad = $cantidad;
            $cotizacion_d->precio_unitario = $precio;
            $cotizacion_d->fecha_registro = Carbon::now();
            $cotizacion_d->save();
        }
        
    }
}
