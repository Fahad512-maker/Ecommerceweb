<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['name' , 'email' , 'password' ,'mobile_number' , 'company_id',  'address' , 'country_id' , 'state_id' , 'city_id' , 'zip_code' , 'status'];

    public function country()
    {
        return $this->belongsTo(Country::class);
    
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
