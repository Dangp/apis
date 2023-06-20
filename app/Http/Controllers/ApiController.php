<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mifiel\Document;


use Mifiel\ApiClient as Mifiel;
use App\Bitacora;  
class ApiController extends Controller
{
    //
    public function principal(Request $request)
    {
        try {
            
            
            return view('principal');
        } catch (\Exception $e) {
            /* dd($e); */
            return response()->json([
                'status' => 'no_valido',
                'data' => 'No se pudo realizar la solicitud, por favor, intente más tarde',
                'code' => 'SER003'
            ], 200);
        }
    }

    public function guardarDocumento(Request $request)
    {
        try {
            /* dd($request->file('file')->getPathname()); */
            Mifiel::setTokens('db16d0a5a2eb0139f339e40d8c6082ef73b0f738', 'BVukTQaAjrVD5e2n/ojk/PGkqqAheS2Q0W/Gmu44c9QjBrHrRuQCnuzBS8nKeO5QgEIlskgxyCi6zOa+a7U3nw==');
            Mifiel::url('https://sandbox.mifiel.com/api/v1/');
            $path = $request->file('file')->getPathname();
            $names = $request->file('file')->getClientOriginalName();
            $document = new Document([
                'file_path' => $path,
                'signatories' => [[
                  'name' => 'Signer 1',
                  'email' => $request->correos,
                  'tax_id' =>  'AAA010101AAA'
                ]]
              ]);
              $document->save();
              $bitacora = new Bitacora();
              $bitacora->email = $request->correos;
              $bitacora->fecha_creacion = now();
              $bitacora->nombre_archivo = $names;
              $bitacora->save(); 
              /* dd(); */
              /* return redirect(); */
              $mensaje = "Se guardo correctamente el archivo";
              return redirect()->route('principal');
        } catch (\Exception $e) {
            
            return response()->json([
                'status' => 'no_valido',
                'data' => 'No se pudo realizar la solicitud, por favor, intente más tarde',
                'code' => 'SER003'
            ], 200);
        }
    }
    
}
