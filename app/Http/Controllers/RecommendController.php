<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recommend;
use App\Models\Material;
use App\Models\Tool;

class RecommendController extends Controller
{
    public function recommend(Request $request)
    {
        // Ambil input kalimat panjang dari pengguna
        $sentence = $request->helper;
        
        // Pecah kalimat menjadi token-token
        $tokens = preg_split('/\s+/', $sentence);
        
        $matches = [];

        $words = collect();
        // Cocokkan token dengan kata-kata dari database
        foreach ($tokens as $token) {
            // Cari kata-kata yang mirip di database
            $matches = Recommend::where('practice', 'LIKE', "%{$token}%")->get();
            if ($matches != null) {
                foreach ($matches as $match) {
                    $words->push($match);
                }
            }
            
            foreach ($words as $word) {
                // Hitung kemiripan
                $similarity = similar_text($token, $word->word, $percent);
                if ($percent > 50) { // Jika kemiripan lebih dari 80%
                    $matches[] = [
                        'token' => $token,
                        'matched_word' => $word->word,
                        'similarity' => $percent,
                        'record' => $word // Menyimpan seluruh baris yang mengandung kata yang mirip
                    ];
                }
            }
        }

        $materials = collect();
        $tools = collect();
        
        foreach ($words as $word) {
            if ($word->material_id != 0) {
                $material = Material::findOrFail($word->material_id);
                $materials->push($material);
            } else {
                $tool = Tool::findOrFail($word->tool_id);
                $tools->push($tool);
            }
        }
        

        return view('user.pages.homepage', compact('sentence', 'words',  'materials', 'tools'));
    }
}
