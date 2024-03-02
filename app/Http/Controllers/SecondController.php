<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SecondController extends Controller
{
    public function index(){
        return "hello, I am index function";
    }

    public function create(){
        return "hello, I am create function";
    }

    public function store(){
        return "hello, I am store function";
    }

    public function update($id){
        return "the id is : " .$id;
    }




}
