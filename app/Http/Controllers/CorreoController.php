<?php

namespace App\Http\Controllers;
use App\Mail\CorreoNotificacionAdminConIniciacion;
use App\Mail\CorreoNotificacionAdminSinIniciacion;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\CorreoContactoConIniciacion;
use App\Mail\CorreoContactoSinIniciacion;
use Symfony\Component\HttpFoundation\Response;

class CorreoController extends Controller
{
    public function enviarCorreoContacto(Request $request){

        //Se consulta si el negocio posee nombre de fantasia
        $switchNombreFantasiaComercio = 0;
        if (!empty($request->input('nombre_fantasia_comercio'))){
            $switchNombreFantasiaComercio = 1;
        }


        if ($request->get('email')){
            //Se verifica si la iniciacion de actividades fue realizada
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
                if ($switchNombreFantasiaComercio == 1){
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
                        'cargo_contacto' => $request->get('cargo.nombre')
                        //'iniciacion' => $request->get('iniciacion_realizada'),
                    ];
                    //Mail::to($mailData['email_contacto'])->send(new CorreoContactoConIniciacion($mailData));
                    //Mail::to('luis.machuca@buyday.cl')->send(new CorreoNotificacionAdminConIniciacion($mailData));
                }
                else{
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
                        'cargo_contacto' => $request->get('cargo')['id']
                        //'iniciacion' => $request->get('iniciacion_realizada'),
                    ];

                }
                Mail::to($mailData['email_contacto'])->send(new CorreoContactoConIniciacion($mailData));
                Mail::to('luis.machuca@buyday.cl')->send(new CorreoNotificacionAdminConIniciacion($mailData));

            }else{
                $request->validate([
                    'nombre_completo'=>'required',
                    'telefono' => 'required|digits:9',
                    'email' => 'required',
                    //'nombre_fantasia_comercio' => 'required',
                    'terminos' => 'accepted',
                ]);
                //if (!empty($request->input('nombre_fantasia_comercio'))){
                if ($switchNombreFantasiaComercio == 1){
                    $mailData = [
                        'title' => 'Registro como vendedor fue exitosa',
                        'url' => 'https://www.buyday.cl',
                        'nombre_contacto' => $request->get('nombre_completo'),
                        'email_contacto' => $request->get('email'),
                        'telefono_contacto' => $request->get('telefono'),
                        'nombre_fantasia_comercio' => $request->get('nombre_fantasia_comercio'),
                        'iniciacion' => 'No'
                        //'iniciacion' => $request->get('iniciacion_realizada'),
                    ];
                } else {
                    $mailData = [
                        'title' => 'Registro como vendedor fue exitosa',
                        'url' => 'https://www.buyday.cl',
                        'nombre_contacto' => $request->get('nombre_completo'),
                        'email_contacto' => $request->get('email'),
                        'telefono_contacto' => $request->get('telefono'),
                        'nombre_fantasia_comercio' => 'No posee',
                        'iniciacion' => 'No'
                        //'iniciacion' => $request->get('iniciacion_realizada'),
                    ];
                }
                //Mail::to('luis.machuca@buyday.cl')->send(new CorreoContactoSinIniciacion($mailData));
                Mail::to($mailData['email_contacto'])->send(new CorreoContactoSinIniciacion($mailData));
                Mail::to('luis.machuca@buyday.cl')->send(new CorreoNotificacionAdminSinIniciacion($mailData));
            }


        }
        else{
            return "Error, no se puede enviar correos";
        }



        /*$email = 'luis.bauer12@gmail.com';*/


        //Mail::to('luis.machuca@buyday.cl')->send(new CorreoContacto($mailData));

        return response()->json([
            'mensaje' => 'Mensaje enviado'
        ], Response::HTTP_OK);
    }


    public function enviarComunicacionIndividual(Request $request){

    }
    /*public function validarDatos(Request $request){
        $request->validate([
            'nombre_completo'=>'required',
            'telefono' => 'required|digits:9',
            'email' => 'required',
            //'nombre_fantasia_comercio' => 'required',
            'terminos' => 'accepted',
            'categorias' => 'required'
        ]);
    }*/
}
