<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FirstController extends Controller
{
    public function index(){
        return "Hi team, how are you";
    }

    public function create(){
        return response()->json(["descriptioon"=>"object created"]);
    }

    public function store($id){
        return "the id is: " . $id ;
    }
}

