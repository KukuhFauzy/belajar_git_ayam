<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gemini\Laravel\Facades\Gemini;

class GeminiController extends Controller
{
    public function index()
    {
        return view('chatbot');
    }

    public function ask(Request $request)
    {

        $request->validate([
            'prompt' => 'required|string|max:200',
        ]);

        try {
            // Prepend system instruction directly into the prompt
            // $systemPrompt = "Gunakan hanya Bahasa Indonesia atau Inggris, jawab singkat.
            // Kamu adalah asisten LeLiLu Creative. Berikut harga produk kami:

            // DAFTAR HARGA:
            // Semua Produk : Rp 30.000  
            // Jika pelanggan bertanya tentang harga, jawab berdasarkan daftar di atas saja.
            // Jika produk tidak ada dalam daftar, katakan bahwa produk tersebut tidak tersedia.
            // Jika ditanya selain tentang Lelilu Creative, jawab Tidak tahu 
            // \n\n";
            // $fullPrompt = $systemPrompt . $request->input('prompt');

            $fullPrompt = $request->input('prompt');

            // $models = Gemini::models()->list();

            // // dd($models);

            // $ayam = [];
            // foreach ($models->models as $model) {
            //     $ayam[] = $model->name;
            // }

            // dd($ayam);

            $result = Gemini::generativeModel(model: 'gemma-3-1b-it')
                ->generateContent($fullPrompt);

            $response = $result->text();
        } catch (\Exception $e) {
            $response = "Error: ";// . $e->getMessage();
        }

        $history = session('chat_history', []);
        $history[] = [
            'prompt' => $request->input('prompt'),
            'response' => $response,
        ];
        session(['chat_history' => $history]);

        return back();
    }

    public function clear()
    {
        session()->forget('chat_history');
        return redirect()->route('chatbot.index');
    }
}