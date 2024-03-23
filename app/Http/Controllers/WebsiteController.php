<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;


class WebsiteController extends Controller
{
    public function index(){
        $product = Item::find(1);
//        return view('first',['product'=>$obj,'flag'=>"Hello I am flag"]);
        $flag = false;
//        return view('first',compact('product','flag'));


        $this->AddData();
        return view('first')->with('product',$product)
            ->with('flag',$flag);
    }


    public function template(){
        $this->AddData();
        return view('template');
    }

    public function AddData(){
        $global_variable = "Hello I am global variable";
        \View::share(['global_variable'=>$global_variable]);
    }

    public function course(){
        return view('second');
    }
}
