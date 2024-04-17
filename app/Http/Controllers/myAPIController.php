<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class myAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $obj = Student::all();
        return response()->json(["data"=>$obj],Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new Student();
        $data->first_name=$request->first_name;
        $data->last_name=$request->last_name;
        $data->date_of_birth=$request->date_of_birth;
        $data->description=$request->description;
        $data->is_registered=$request->is_registered;
       $data->save();
        return response()->json(["message"=>"Student created with success"],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $obj = Student::findOr($id,function (){
            return response()->json(["message"=>"not found"],Response::HTTP_NOT_FOUND);
        });
        return response()->json(["data"=>$obj],Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Student::find($id);
        $data->first_name=$request->first_name;
        $data->last_name=$request->last_name;
        $data->date_of_birth=$request->date_of_birth;
        $data->description=$request->description;
        $data->is_registered=$request->is_registered;
        $data->save();
        return response()->json(["message"=>"Student updated with success"],Response::HTTP_OK);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Student::find($id);
        $data->delete();
        return response()->json(["message"=>"Student is deleted with success"],Response::HTTP_OK);

    }
}
