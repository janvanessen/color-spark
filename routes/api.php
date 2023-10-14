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
    $description = request('text', '');

 
    $prompt = "Generate a JSON array with three color palettes." .
              "Each color palette is a JSON array of uppercase hex values corresponding the description '" .
               $description . "' with five colors. " .
        "Example: [\"#1D2549\", \"#4E637A\", \"#9EADC8\", \"#D4E6FD\", \"#E3E8F2\"] ";


    $result = OpenAI::completions()->create([
        'model' => 'text-davinci-003',
        'prompt' => $prompt,
        'max_tokens' => 1000,
    ]);

    $response = $result['choices'][0]['text'];

    return response()->json([
        'colorSets' => $response
    ]);
});
