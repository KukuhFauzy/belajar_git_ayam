<?php

use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GeminiController;

Route::get('/chatbot', [GeminiController::class, 'index'])->name('chatbot.index');
Route::post('/chatbot/ask', [GeminiController::class, 'ask'])->name('gemini.ask');
Route::post('/chatbot/clear', [GeminiController::class, 'clear'])->name('chatbot.clear');


Route::get("/bebek", (function()  {
    echo "bebek";
    $products = Product::where("price", ">", 10000)->get();
    dd($products);
}));

Route::get("/motor", function(){

    $ayam = Product::all();
    // $ayam = 1;
    $bebek = "bebek enak";
    return view("mawar", ["bebek" => $ayam]);
});

Route::get("/pesawat", function(){

    $ikan = Product::all();
    // kodingan
    if ($ikan ) {
        # code...
    }
    return view("kardus", ["hiu" => $ikan]);
});