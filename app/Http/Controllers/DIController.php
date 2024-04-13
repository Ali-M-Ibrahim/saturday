<?php

namespace App\Http\Controllers;

use App\Services\LogService;
use Illuminate\Http\Request;

class DIController extends Controller
{


    private $mylogService;
    public function __construct(LogService $log)
    {
        $this->mylogService=$log;

    }


    public function example(){
        $obj = new LogService();
        $obj->LogData("this is my my message from old technique");
        return "ok";
    }

    public function example2(LogService $logger){
        $logger->LogData("This is my message from Dependency injection by method");
        return "ok";
    }

    public function example3(){

        $this->mylogService->LogData('this is my message from DI using constructor');
        return "ok";
     }


    public function example4(){

    }


}
