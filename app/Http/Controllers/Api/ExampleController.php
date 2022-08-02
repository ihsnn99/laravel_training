<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\Code;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExampleController extends Controller
{
    function apidata(){
        $codes = Code::all();

        return response()->json([
            'msg' => "All Data",
            'data' => $codes
        ]);
    }

    function createcode(){
        try{
            request()->validate([
                "name_1" => 'required',
                "name_2" => 'required',
            ]);

            Code::create(request()->all());

            return response()->json([
                'msg' => "Code created"
            ]);
        }catch(Exception $err){
            return response()->json([
                'msg' => "Failure",
                'errors' => $err->getMessage()
            ]);
        }
        
    }

    function deletecode($id){
        Code::destroy($id);

        return response()->json([
            'msg' => "Code id >".$id."deleted"
        ]);
    }

    function updatecode($id){
        try{
            $codes = Code::find($id);

            $codes->fill(request()->all());
            $codes->save();

            return response()->json([
                'msg' => "Code id >".$id."updated"
            ]);
        }catch(\Exception $err){
            return response()->json([
                'msg' => "Failure",
                'errors' => $err->getMessage()
            ]);
        }
        
    }
}
