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
            'prompt' => 'required|string|max:2000',
        ]);

        try {
            $result = Gemini::generativeModel(model: 'gemini-2.5-flash')
                ->generateContent($request->input('prompt'));
            $response = $result->text();
        } catch (\Exception $e) {
            $response = "Error: " . $e->getMessage();
        }

        // Use regular session (not flash) so history persists across messages
        $history = session('chat_history', []);
        $history[] = [
            'prompt' => $request->input('prompt'),
            'response' => $response,
        ];
        session(['chat_history' => $history]);

        return back();
    }

    // Clear chat history for New Chat
    public function clear()
    {
        session()->forget('chat_history');
        return redirect()->route('chatbot.index');
    }
}