<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    public function getCustomerAddress(){
        return $this->hasOne(CustomerAdress::class);
    }

    public function getAccounts(){
        return $this->hasMany(Account::class);
    }

    public function getServices(){
        return $this->belongsToMany(Service::class,
                            'customer_services',
            'customer_id',
            'service_id'
        );
    }
}
