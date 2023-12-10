<?php

namespace App\Http\Controllers;


use App\Models\Dress;
use Illuminate\Http\Request;

class DressController extends Controller
{
    public function show(){
        $dresses = Dress::all();
        return view('welcome', compact('dresses')); 
        // compact -> passing data
    }  

    public function create(){
        return view ('createDress');
    }

    public function store(Request $request){
        Dress::create([
            'dresstype' => $request->dresstype,
            'designer' => $request->designer,
            'color'=> $request->color,
            'size'=> $request->size,
            'stock'=> $request->stock
        ]);

        //nama atribut => $request->name dari input form
        return redirect(route('show'));
    }
}
