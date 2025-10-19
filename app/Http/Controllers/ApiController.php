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

    public function clientById($id){

        $cliente = Client::find($id);

         return response()->json(
            [
            'status' => 'ok',
            'message'=>'api funcionando',
            'status_code'=>200,
            'data'=>$cliente
            ],200
        );


       


    }

    public function client(Request $request){

        //verificando se o id veio na requisição
        
        if(!$request->id){
            return response()->json(
                [
                'status' => 'error',
                'message'=>'id do cliente é obrigatório',
                'status_code'=>400
                ],400
            );
        }

        $cliente = Client::find($request->id);

         return response()->json(
            [
            'status' => 'ok',
            'message'=>'api funcionando',
            'status_code'=>200,
            'data'=>$cliente
            ],200
        );

    }

    public function addClient(Request $request){
        
       //para gravar um cliente novo 
       //o processo eo mesmo do eloquent 
       //mas no caso de uma api eu tenho que visar que deu certo 
        
        $client = new Client();
        $client->name = $request->name;
        $client->email = $request->email;
        $client->save();

         return response()->json(
            [
            'status' => 'ok',
            'message'=>'Cliente adicionado com sucesso',
            'data'=>$client,
            ],201
        );

    }

    
}
