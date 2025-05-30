<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NomeAnalogController;
use App\Http\Controllers\TemporadasController;

Route:: get('/nomeAnalog',[NomeAnalogController::class,'index']);

Route::get('/',function(){return response()->json(['Sucesso'=>true]);}
);
Route::get('/nomeAnalog/{id}',[NomeAnalogController::class,'show']);

Route::post('/nomeAnalog',[NomeAnalogController::class,'store']);

Route::put('/nomeAnalog/{id}',[NomeAnalogController::class,'update']);

Route::delete('/nomeAnalog/{id}',[NomeAnalogController::class,'destroy']);

#######################################

Route:: get('/temporadas',[TemporadasController::class,'index']);

Route::get('/',function(){return response()->json(['Sucesso'=>true]);}
);
Route::get('/temporadas/{id}',[TemporadasController::class,'show']);

Route::post('/temporadas',[TemporadasController::class,'store']);

Route::put('/temporadas/{id}',[TemporadasController::class,'update']);

Route::delete('/temporadas/{id}',[TemporadasController::class,'destroy']);
