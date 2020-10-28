<?php

namespace App\Http\Controllers;

use App\Mail\CorreoNotificacionAdminConIniciacion;
use App\Mail\CorreoNotificacionAdminSinIniciacion;
use App\Models\Categoria;
use App\Models\CategoriaContacto;
use App\Models\Contacto;
use App\Models\Categorias;
use App\Models\Comercio;
use App\Models\Cargo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mail\CorreoContacto;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class ContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contactos = Contacto::all()->toArray();

        $count = Contacto::count();

        return response()->json([
            'contactos' => $contactos,
            'count' => $count
        ], 200);
        //return array_reverse($contactos);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //Se validan los campos en lado servidor


        //Se obtiene el array con las categorias
        $categorias = $request->get('categorias');
        $fecha_alta = Carbon::now();


        if ($request->get('iniciacion_realizada')){
            $request->validate([
                'nombre_completo'=>'required',
                'telefono' => 'required|digits:9',
                'email' => 'required',
                //'nombre_fantasia_comercio' => 'required',
                'terminos' => 'accepted',
                'rut_comercio' => 'required',
                'razon_social' => 'required',
                'cargo' => 'required'
            ]);
            if ($request->get('nombre_fantasia_comercio')) {
                $contacto = new Contacto([
                    'nombre_completo' => $request->input('nombre_completo'),
                    'telefono' => $request->input('telefono'),
                    'email' => $request->input('email'),
                    'nombre_fantasia_comercio' => $request->input('nombre_fantasia_comercio'),
                    'iniciacion_realizada' => '1',
                    'fecha_alta' => Carbon::now()
                    //'fecha_alta' => $fecha_alta->format('d-m-Y')
                ]);
            }
            else{
                $contacto = new Contacto([
                    'nombre_completo' => $request->input('nombre_completo'),
                    'telefono' => $request->input('telefono'),
                    'email' => $request->input('email'),
                    'iniciacion_realizada' => '1',
                    'fecha_alta' => Carbon::now()
                ]);
            }
            $contacto->save();

            $comercio = DB::table('comercios')->insert([
                ['rut' => $request->input('rut_comercio'),
                'razon_social' => $request->input('razon_social'),
                'contacto_id' => $contacto->id,
                'cargo_id' => $request->input('cargo.id')
                ]
            ]);

            $this->guardarCategorias($categorias, $contacto);

            return response()->json([
                'contacto'=>$contacto,
                'comercio'=>$comercio
                //'data' => $mailData
            ]);
        }
        else{

            $request->validate([
                'nombre_completo'=>'required',
                'telefono' => 'required|digits:9',
                'email' => 'required',
                //'nombre_fantasia_comercio' => 'required',
                'terminos' => 'accepted',
                'categorias' => 'required'
            ]);
            if ($request->get('nombre_fantasia_comercio')) {
                $contacto = new Contacto([
                    'nombre_completo' => $request->input('nombre_completo'),
                    'telefono' => $request->input('telefono'),
                    'email' => $request->input('email'),
                    'nombre_fantasia_comercio' => $request->input('nombre_fantasia_comercio'),
                    'iniciacion_realizada' => '0',
                    'fecha_alta' => Carbon::now()
                    //Indicar recomendacio inciacion
                ]);
            }
            else{
                $contacto = new Contacto([
                    'nombre_completo' => $request->input('nombre_completo'),
                    'telefono' => $request->input('telefono'),
                    'email' => $request->input('email'),
                    'iniciacion_realizada' => '0',
                    'fecha_alta' => $fecha_alta
                    //'fecha_alta' => Carbon::now()
                    //Indicar recomendacio inciacion
                ]);
            }
            $contacto->save();
            $this->guardarCategorias($categorias, $contacto);

            return response()->json([
                'contacto' => $contacto
            ]);
        }






    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Contacto::where('id', $id)->exists()){
            $contacto = Contacto::find($id);
            $comercio_contacto = DB::table('comercios')->join('cargos', 'comercios.cargo_id', "=", 'cargos.id')->where('contacto_id', $id)->select('rut', 'razon_social', 'cargos.nombre as cargo')->get();
            //$comercio_contacto = Comercio::where('contacto_id', $id)->get();
            $categorias_contacto = DB::table('categorias_contacto')->join('categorias', 'categorias.id', "=", 'categorias_contacto.categoria_id')->where('contacto_id', $id)->get('descripcion');
            return response()->json([
                'contacto' => $contacto,
                'comercio' => $comercio_contacto,
                'categorias' => $categorias_contacto
            ], 200);
        } else {
            return response()->json([
                'mensaje' => 'No hay contactos'
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function edit(Contacto $contacto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contacto $contacto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    /*public function destroy(Contacto $contacto)
    {

    }*/

    public function borrarContacto($id){
        $contacto = Contacto::findOrFail($id);
        if ($contacto){
            $contacto->delete();
            return response()->json([
                'mensaje' => 'Contacto borrado'
            ]);
        }
        else{
            return response()->json([
                'error' => 'NO se encuentra contacto'
            ]);
        }
    }

    public function guardarCategorias($categorias, $contacto){
        foreach ($categorias as $key => $value){
            //return response()->json($categorias[$key]['id']);
            DB::table('categorias_contacto')->insert([
                ['contacto_id' => $contacto->id,
                    'categoria_id' => $categorias[$key]['id']]
            ]);
        }
    }
}
