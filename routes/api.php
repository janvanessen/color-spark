<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use OpenAI\Laravel\Facades\OpenAI;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/colors', function (Request $request) {
    $prompt = request('text', 'default'); 

    $result = OpenAI::completions()->create([
        'model' => 'text-davinci-003',
        'prompt' => $prompt,
    ]);
    
    $answer = $result['choices'][0]['text']; // an open-source, widely-used, server-side scripting language.

    return response()->json([
        'answer' => $answer
    ]);
});