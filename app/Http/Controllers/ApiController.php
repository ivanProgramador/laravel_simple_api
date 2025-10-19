<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function status(){
        
        //devolvendo json com o status da api 

        return response()->json([
            'status' => 'ok',
            'message'=>'api funcionando',
            'status_code'=>200
            ]
        );

    }

    public function clients(){

        $clientes = Client::paginate(2);

         return response()->json(
            [
            'status' => 'ok',
            'message'=>'api funcionando',
            'status_code'=>200,
            'data'=>$clientes
            ],200
        );



    }


}
