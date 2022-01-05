<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $fillable=['name'];

    public function productattribute($value='')
    {
        return $this->hasOne(Product_attribute::class);
    }
}
