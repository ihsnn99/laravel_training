<?php

namespace App\Http\Controllers;

use auth;
use App\Models\Code;
use App\Mail\CodeCreated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

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

        request()->validate([
            'name_1' => 'required|max:20',
            'name_2' => 'required',
        ]);

        $code = new Code;

        $code->name_1 = $request->name_1;
        $code->name_2 = $request->name_2;
        $code->user_id = auth()->user()->id;

        $code->save();

        // Code::create(
        //     request()->all()
        // );

        
        return redirect('admin/show');
    }

    function show(){
        $codes = Code::with('user')->orderBy('created_at', 'desc')->paginate(5);

        $currency = $this->getfromAPI();
        return view('show', [ 'codes' => $codes, 'currency' => $currency->data ]);
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

        Mail::to('ihsan@mail.com')->send(new CodeCreated());

        return redirect()->route('admin.show');
    }

    public static function getHttpHeaders(){
        $headers = [
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/vnd.BNM.API.v1+json'
            ],
            'http_errors' => false,
        ];
        return $headers;
    }

    public function getfromAPI(){
        $res = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/vnd.BNM.API.v1+json'
        ])->get('https://api.bnm.gov.my/public/exchange-rate');
        
        $currencyResponse = $res->body();

        return json_decode($currencyResponse);
    }
}
