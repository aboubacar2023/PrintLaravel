<?php

namespace App\Http\Controllers;

use App\Models\Donneur;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class Printer extends Controller
{
    public function index() {
        return view('impression');
    }
    public function impression(Request $request) {
        $data = Donneur::create([
            'prenom' => $request->input('prenom'),
            'nom' => $request->input('nom'),
        ]);
        $pdf = Pdf::loadView('exemple', ["data"=>$data]);
        return $pdf->stream();
        
    }
}
