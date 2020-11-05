<?php

namespace App\Http\Controllers;
use App\Mail\NotificacionNuevoVendedor;
use App\Models\Categoria;
use App\Models\CategoriaContacto;
use App\Models\Contacto;
use App\Models\Categorias;
use App\Models\Comercio;
use App\Models\Cargo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mail\CorreoContacto;
use App\Mail\CorreoContactoConIniciacion;
use App\Mail\CorreoContactoSinIniciacion;
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
        $url_path = 'https://preinscripcion.buyday.cl/dashboard/contactos/';

        //Se consulta si el negocio posee nombre de fantasia
        $switchNombreFantasiaComercio = 0;
        if (!empty($request->input('nombre_fantasia_comercio'))){
            $switchNombreFantasiaComercio = 1;
        }

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
            //if ($request->get('nombre_fantasia_comercio')) {
            if ($switchNombreFantasiaComercio == 1){
                $contacto = new Contacto([
                    'nombre_completo' => $request->input('nombre_completo'),
                    'telefono' => $request->input('telefono'),
                    'email' => $request->input('email'),
                    'nombre_fantasia_comercio' => $request->input('nombre_fantasia_comercio'),
                    'iniciacion_realizada' => '1',
                    'fecha_alta' => Carbon::now()
                    //'fecha_alta' => $fecha_alta->format('d-m-Y')
                ]);
                $contacto->save();
                $id_contacto = $contacto->id;
                $url_ficha = $url_path.''.$id_contacto;
                $mailData = [
                    'title' => 'Registro como vendedor fue exitosa',
                    'url' => 'https://www.buyday.cl',
                    'nombre_contacto' => $request->get('nombre_completo'),
                    'email_contacto' => $request->get('email'),
                    'telefono_contacto' => $request->get('telefono'),
                    'nombre_fantasia_comercio' => $request->get('nombre_fantasia_comercio'),
                    'iniciacion' => 'Si',
                    'rut_comercio' => $request->get('rut_comercio'),
                    'razon_social' => $request->get('razon_social'),
                    'cargo_contacto' => $request->get('cargo.nombre'),
                    'url_ficha' => $url_ficha
                    //'iniciacion' => $request->get('iniciacion_realizada'),
                ];
            }
            else{
                $contacto = new Contacto([
                    'nombre_completo' => $request->input('nombre_completo'),
                    'telefono' => $request->input('telefono'),
                    'email' => $request->input('email'),
                    'iniciacion_realizada' => '1',
                    'fecha_alta' => Carbon::now()
                ]);
                $contacto->save();
                $id_contacto = $contacto->id;
                $url_ficha = $url_path.''.$id_contacto;
                $mailData = [
                    'title' => 'Registro como vendedor fue exitosa',
                    'url' => 'https://www.buyday.cl',
                    'nombre_contacto' => $request->get('nombre_completo'),
                    'email_contacto' => $request->get('email'),
                    'telefono_contacto' => $request->get('telefono'),
                    'nombre_fantasia_comercio' => 'No posee',
                    'iniciacion' => 'Si',
                    'rut_comercio' => $request->get('rut_comercio'),
                    'razon_social' => $request->get('razon_social'),
                    'cargo_contacto' => $request->get('cargo')['id'],
                    'url_ficha' => $url_ficha
                    //'iniciacion' => $request->get('iniciacion_realizada'),
                ];
            }
            //$contacto->save();

            $comercio = DB::table('comercios')->insert([
                ['rut' => $request->input('rut_comercio'),
                'razon_social' => $request->input('razon_social'),
                'contacto_id' => $contacto->id,
                'cargo_id' => $request->input('cargo.id')
                ]
            ]);

            $this->guardarCategorias($categorias, $contacto);
            Mail::to('notificaciones@preinscripcion.buyday.cl')->send(new NotificacionNuevoVendedor($mailData));
            Mail::to($mailData['email_contacto'])->send(new CorreoContactoConIniciacion($mailData));

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
            if ($switchNombreFantasiaComercio == 1){
                $contacto = new Contacto([
                    'nombre_completo' => $request->input('nombre_completo'),
                    'telefono' => $request->input('telefono'),
                    'email' => $request->input('email'),
                    'nombre_fantasia_comercio' => $request->input('nombre_fantasia_comercio'),
                    'iniciacion_realizada' => '0',
                    'fecha_alta' => Carbon::now(),
                    //'url_ficha' => 
                    //Indicar recomendacio inciacion
                ]);
                $contacto->save();
                $id_contacto = $contacto->id;
                $url_ficha = $url_path.''.$id_contacto;
                $mailData = [
                    'title' => 'Registro como vendedor fue exitosa',
                    'url' => 'https://www.buyday.cl',
                    'nombre_contacto' => $request->get('nombre_completo'),
                    'email_contacto' => $request->get('email'),
                    'telefono_contacto' => $request->get('telefono'),
                    'nombre_fantasia_comercio' => $request->get('nombre_fantasia_comercio'),
                    'iniciacion' => 'No',
                    'url_ficha' => $url_ficha
                    //'iniciacion' => $request->get('iniciacion_realizada'),
                ];
            }
            else{
                
                $contacto = new Contacto([
                    'nombre_completo' => $request->input('nombre_completo'),
                    'telefono' => $request->input('telefono'),
                    'email' => $request->input('email'),
                    'iniciacion_realizada' => '0',
                    'fecha_alta' => $fecha_alta,
                ]);
                $contacto->save();
                $id_contacto = $contacto->id;
                $url_ficha = $url_path.''.$id_contacto;
                $mailData = [
                    'title' => 'Registro como vendedor fue exitosa',
                    'url' => 'https://www.buyday.cl',
                    'nombre_contacto' => $request->get('nombre_completo'),
                    'email_contacto' => $request->get('email'),
                    'telefono_contacto' => $request->get('telefono'),
                    'nombre_fantasia_comercio' => 'No posee',
                    'iniciacion' => 'No',
                    'url_ficha' => $url_ficha
                ];
            }
            $this->guardarCategorias($categorias, $contacto);
            Mail::to($mailData['email_contacto'])->send(new CorreoContactoSinIniciacion($mailData));
            Mail::to('notificaciones@preinscripcion.buyday.cl')->send(new NotificacionNuevoVendedor($mailData));


            return response()->json([
                'contacto' => $contacto,
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
