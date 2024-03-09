<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $obj = Item::all(); // Select * from items

        $obj2 = Item::find(6); // select * from items where id = 6

        $obj3 = Item::where('name','Item 1')->get();
        return $obj3;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $obj = new Item();
        $obj->name= "Item 1";
        $obj->description= "this is my description";
        $obj->price = 10.0;
        $obj->save();
        return response()->json(["message"=>"The Item was created"],201);
    }

    public function create2()
    {
        Item::create(
            [
                "name"=>"Item 2",
                "description"=>"This is the description of item 2",
                "price"=>20.0
            ]
        );
        return response()->json(["message"=>"The Item was created"],201);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

//        $obj = new Item();
//        $obj->name= "#1-" . $request->name;
//        $obj->description= "#1-" .$request->input('description',"default description");
//        $obj->price =  $request->price;
//        $obj->save();
//
//
//        Item::create(
//            [
//                "name"=> "#2-" . $request->name,
//                "description"=>"#2-" . $request->description,
//                "price"=> $request->price,
//            ]
//        );
//
//
        Item::create($request->all());

        return response()->json(["message"=>"The Item was created"],201);

    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $obj = Item::find($id);
        $obj->name= "Item 1 updated";
        $obj->description= "this is my description updated";
        $obj->price = 20.0;
        $obj->save();

        $obj = Item::where('id', ">" ,0)
            ->update(["name"=>"Item updated mass", "description"=>"upadted mass"]);

        return response()->json(["message"=>"The Item was updated"],201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $obj = Item::find($id);
        $obj->name= $request->name;
        $obj->description= $request->description;
        $obj->price =$request->price;
        $obj->save();
        return " ia am update function";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        //
    }


    public function delete($id){
//        $obj = Item::find($id);
//        $obj->delete();

        $obj = Item::where('id', ">" ,0)
            ->delete();

        return "I am delete function";
    }

    public function updateByName(Request $request, $name){

        $obj = Item::where('name', $name)
            ->update(["name"=>"Item updated mass", "description"=>"upadted mass"]);

        return "ok";

    }



}
