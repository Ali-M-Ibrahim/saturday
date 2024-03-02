<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return "hello, I am index function";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return "hello, I am create function";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return "hello, I am store function";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return "I am edit function and my parameter is:" .$id;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        return "I am destroy function" . $id;
    }
}
