<?php

namespace App\Http\Controllers;

use App\Models\Code;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ExampleController extends Controller
{
    function main(){
        return view('welcome');
    }

    function string(){
        return "Hello World";
    }

    function create(){
        return view('create');
    }

    function store(Request $request){
        
        // $code = new Code;

        // $code->name_1 = $request->fname;
        // $code->name_2 = $request->lname;

        // $code->save();

        request()->validate([
            'name_1' => 'required|max:20',
            'name_2' => 'required',
        ]);

        Code::create(
            request()->all()
        );

        
        return redirect('admin/show');
    }

    function show(){
        $codes = Code::orderBy('created_at', 'desc')->get();
        return view('show', compact('codes'));
    }

    function destroy($id){
        Code::destroy($id);
        return redirect()->route('admin.show');
    }

    function edit($id){
        $code = Code::find($id);
        return view('edit', compact('code'));
    }

    function update($id){
        request()->validate([
            'name_1' => 'required|max:20',
            'name_2' => 'required',
        ]);

        $code = Code::find($id);
        $code->name_1 = request()->name_1;
        $code->name_2 = request()->name_2;
        $code->save();

        return redirect()->route('admin.show');
    }
}
