<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\NomeAnalog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;

class NomeAnalogController extends Controller
{


    public function index()
    {

    $registro01 = NomeAnalog :: all();
    $contar = $registro01 -> count();

        if($contar > 0){
            return Response()->json([
                'sucesso' => true,
                'mensagem' => 'Analog Horrors encontrados',
                'data'=> $registro01,
                'total'=> $contar,
            ],200);
        }else{
            return Response()->json([
                'sucesso' => false,
                'mensagem'=> 'Error ao achar Analog Horrors',
            ],404);
        }
    }
    public function store(Request $request)
    {
    $validator = Validator::make($request->all(),[
    'nome'=>'required',
    'nomeCriador'=>'required',
    'idioma' => 'required',
    'tipo' => 'required',
    'sinopsia' => 'required',
]);
    if ($validator->fails()){
    return response()->json([
    'success'=> false,
    'message'=> 'Resgistros invalidos',
    'errors'=>$validator->errors(),
    ],400);
}
$registro01 = NomeAnalog::create($request->all());

if($registro01){

    return response()->json([
        'sucesso'=> true,
        'mensagem'=> 'Analog Horror cadastrado',
        'data'=> $registro01
    ], 201);

}else{
    return response()-> json([
        'sucesso'=> false,
        'mensagem'=> 'Error ao cadastrar Analog Horror',
    ], 500);
    }}
   
    public function show($id)
    {
$registro01 = NomeAnalog::find($id);
if ($registro01){
    return response()-> json([
        'sucesso'=> true,
        'mensagem'=> 'Analog Horror encontrado',
        'data'=> $registro01
    ], 200);
} else{
    return response ()->json([
        'sucesso'=> false,
        'mensagem'=> 'Analog Horror nao encontrado',
    ], 404);
}
    }

   
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(),[
            'nome'=>'required',
            'nomeCriador'=>'required',
            'idioma' => 'required',
            'tipo' => 'required',
            'sinopsia' => 'required'
        ]);

        if ($validator->fails()){
            return response()->json([
                'success'=> false,
                'message'=> 'Resgistros invalidos',
                'errors'=>$validator->errors(),
            ],400);
        }
         $db = NomeAnalog::find($id);
         if(!$db){
         return response()->json([
            'sucesso' => false,
            'mensagem'=> 'Analog Horror não encontrado'
         ], 404);}

         $db -> nome = $request -> nome;
         $db -> nomeCriador = $request -> nomeCriador;
         $db -> idioma = $request -> idioma;
         $db -> tipo = $request -> tipo;
         $db -> sinopsia = $request -> sinopsia;

         if($db -> save()){
            return response()->json([
                'sucesso'=> true,
                'menssagem'=>'Analog Horror não encontrado',
                'data'=>$db],200);
            
            }
            else {
          return response()->json([
         'sucesso'=> false,
         'mensagem'=> 'Erro ao encontrar Analog Horrors'],500);}
    }
      
 
    public function destroy($id)
    {
    $registro01= NomeAnalog::find($id);

    if(!$registro01){
        return response()->json([
            'sucesso'=> false,
            'mensagem'=> 'Analog Horror não encontrado',
        ],404);
    }
    if (!$registro01 ->delete()){
        return response()->json([
            'sucesso'=> true,
            'mensagem'=> 'Analog Horros deletado conm sucesso',
        ],200);
    }
    return response ()->json([
        'sucesso'=> false,
        'mensagem'=> 'Erro ao deletar analog horror'
    ],500);
    }
}
