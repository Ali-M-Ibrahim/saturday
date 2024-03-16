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


    public function getItemByName($name){
        $obj = Item::where('name',$name)->get(); // select * from items where name= $name
        return $obj;
    }

    public function getFirstItemByName($name){
        $obj = Item::where('name',$name)->first(); // select * from items where name= $name limit 1
        return $obj;
    }

    public function getItemByNameAndPrice($name,$price){
        $obj = Item::where('name',$name)
            ->where('price','>=',$price)
            ->get(); // select * from items where name= $name and price >= $price
        return $obj;
    }

    public function getItemByNameOrPrice($name,$price){
        $obj = Item::where('name',$name)
            ->Orwhere('price','>=',$price)
            ->get(); // select * from items where name= $name or price >= $price
        return $obj;
    }

    public function getItemBySeveralId($id1,$id2,$id3){
        $obj = Item::where('id',$id1)
            ->Orwhere('id',$id2)
            ->Orwhere('id',$id3)
            ->get(); // select * from items where id= $id1 or id = $id2 or id=$id3
        return $obj;
    }


    public function getItemInSeveralId($id1,$id2,$id3){
        $obj = Item::whereIn('id',[$id1,$id2,$id3])
            ->get(); // select * from items where id in ($id1,$id2,$id3)
        return $obj;
    }



    public function getItemWherePriceBetween($price1,$price2){
        $obj = Item::whereBetween('price',[$price1, $price2])
            ->get(); // select * from items where price between price1 and price2
        return $obj;
    }



    public function getNameAndPriceByName($name){
        $obj = Item::where('name',$name)
            ->select(['id','name','price'])
            ->orderBy('id','asc')
            ->take(2)
            ->get(); // select name,price from items where name= $name
        return $obj;
    }



    public function getItemByNameMax($name){
        $obj = Item::where('name',$name)
//            ->max('id')
//            ->min('id')
//            ->sum('price')
//            ->avg('price');
        ->count();
        return $obj;
    }




    public function getItemById($id){
        $obj = Item::find($id); // select * from items where id=$id
        return $obj;
    }

    public function getItemOrFailById($id){
        $obj = Item::findOrFail($id); // select * from items where id=$id
        return $obj;
    }


    public function getItemOrById($id){
        $obj = Item::findOr($id,function(){
            return "this row does not exist";
        }); // select * from items where id=$id
        return $obj;
    }

    public function getFirstOrFailItemByName($name){
        $obj = Item::where('name',$name)->firstOrFail(); // select * from items where name= $name limit 1
        return $obj;
    }

    public function getFirstOrItemByName($name){
        $obj = Item::where('name',$name)->firstOr(function(){
            return "data does not exist";
        }); // select * from items where name= $name limit 1
        return $obj;
    }




}

