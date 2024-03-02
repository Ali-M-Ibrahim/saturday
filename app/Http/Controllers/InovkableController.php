<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InovkableController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
       return "hello from invoke";
    }
}
