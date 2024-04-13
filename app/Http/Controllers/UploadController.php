<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UploadController extends Controller
{
    public function index(){
        return view('ImageUpload');
    }

    public function storeImageMethod1(Request $request){
        $request->validate([
            'myfile'=>'required|mimes:png,pdf'
        ]);
        // Method 1
        if($request->hasFile('myfile')){
            // Changing the name of the file
            $filename = time() . '-' . $request->file('myfile')->getClientOriginalName();
            //to store image
            $request->file('myfile')->move('MyImages',$filename);
            // path to be stored in database
            $path = "MyImages/".$filename;

            return $path;
        }else{
            return "no image uploaded";
        }

    }

    public function storeImageMethod2(Request $request){
        $request->validate([
            'myfile'=>'required|mimes:png,pdf'
        ]);
        // Method 2
        if($request->hasFile('myfile')){
            // Changing the name of the file
            $filename = time() . '-' . $request->file('myfile')->getClientOriginalName();
            //to store image
            $request->file('myfile')->storeAs('public/method2',$filename);
            // path to be stored in database
            $path = 'storage/method2/'.$filename;
            return $path;
        }else{
            return "no image uploaded";
        }

    }

    public function storeImageMethod3(Request $request){
        $request->validate([
            'myfile'=>'required|mimes:png,pdf'
        ]);
        // Method 2
        if($request->hasFile('myfile')){
            $imgName = $request->file('myfile')->store('public/method3');
            // path to be stored in database
            $path= Str::replace('public', 'storage', $imgName) ;
            return $path;
        }else{
            return "no image uploaded";
        }

    }
}
