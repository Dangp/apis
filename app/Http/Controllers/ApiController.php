<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mifiel\Document;


use Mifiel\ApiClient as Mifiel;
  
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
            $document = new Document([
                'file_path' => $path,
                'signatories' => [[
                  'name' => 'Signer 1',
                  'email' => 'signer1@email.com',
                  'tax_id' =>  'AAA010101AAA'
                ], [
                  'name' => 'Signer 2',
                  'email' => 'signer2@email.com',
                  'tax_id' =>  'AAA010102AAA'
                ]]
              ]);
              /* dd($document->save()); */
            
            return view('principal');
        } catch (\Exception $e) {
            
            return response()->json([
                'status' => 'no_valido',
                'data' => 'No se pudo realizar la solicitud, por favor, intente más tarde',
                'code' => 'SER003'
            ], 200);
        }
    }
    
}
