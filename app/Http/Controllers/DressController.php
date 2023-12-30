<?php

namespace App\Http\Controllers;


use App\Models\Dress;
use App\Models\Category;
use Illuminate\Http\Request;

class DressController extends Controller
{
    public function show(){
        $dresses = Dress::all();
        return view('welcome', compact('dresses'));
        // compact -> passing data
    }

    public function create(){
        $categories = Category::all();
        return view('createDress', compact('categories'));
    }

    public function store(Request $request){

        $request->validate([
            'dresstype' => 'required|min:4' ,
            'designer' => 'required|max:20',
            'color'=> 'required|min:3',
            'size'=> 'required|min:2' ,
            'stock'=> 'required|gt:5' ,
            'image'=> 'required|mimes:png,jpg'
        ]);

        $fileName = $request->dresstype . '-' . $request->designer . '-' . $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public/image',$fileName);

        Dress::create([
            'dresstype' => $request->dresstype,
            'designer' => $request->designer,
            'color'=> $request->color,
            'size'=> $request->size,
            'stock'=> $request->stock,
            'image'=> $fileName,
            'category_id' => $request->category_name
        ]);

        //nama atribut => $request->name dari input form
        return redirect(route('show'));
    }

    public function edit($id){
       $dress = Dress::findOrFail($id);
       return view('editDress', compact('dress'));
    }

    public function update(Request $request, $id){
        $dress = Dress::findOrFail($id);

        $dress->update([
            'dresstype' => $request->dresstype,
            'designer' => $request->designer,
            'color'=> $request->color,
            'size'=> $request->size,
            'stock'=> $request->stock
        ]);
        return redirect(route('show'));
    }

    public function delete($id){
        Dress::destroy($id);
        return redirect(route('show'));
    }
}
