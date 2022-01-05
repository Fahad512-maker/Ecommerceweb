<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable=['customer_id' , 'name' , 'email' , 'mobile_number' , 'address' , 'country' , 'state' , 'city' , 'zipcode' , 'coupon_code' , 'coupon_value' , 'total_amt' ];
}
