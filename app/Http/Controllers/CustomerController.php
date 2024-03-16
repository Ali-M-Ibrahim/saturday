<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Customer;
use App\Models\CustomerAdress;
use App\Models\Service;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){
        $obj = Customer::find(1);
       $address= $obj->getCustomerAddress;
       $accounts = $obj->getAccounts;
       $services = $obj->getServices;
        return $services;

//        $obj = CustomerAdress::find(1);
//        $thecustomer = $obj->getCustomer;
//        return $thecustomer;

//        $obj= Account::find(1);
//        $thecustomer = $obj->getCustomer;
//        return $thecustomer;

//        $obj = Service::find(1);
//        $custs= $obj->getCustomers;
//        return $custs;
    }
}
