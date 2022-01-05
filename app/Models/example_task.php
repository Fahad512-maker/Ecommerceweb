<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class example_task extends Model
{
    use HasFactory;

    protected $fillable=['name' , 'email' , 'password'];
}
