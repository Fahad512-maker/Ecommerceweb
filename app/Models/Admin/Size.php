<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    protected $fillable = ['sizes'];

    public function productattribute()
    {
        return $this->hasOne(Product_attribute::class);
    }
}
