<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment_method extends Model
{
    use HasFactory;

    protected $fillable=['customer_id' , 'order_id' , 'payment_amount' , 'order_status' , 'payment_status' , 'payment_id' , 'payment_type'];

    public function order()
    {
        return $this->belongsTo(Order_status::class);
    }
}
