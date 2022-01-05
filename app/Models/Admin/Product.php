<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable =['category_id', 'subcategory_id', 'title', 'brand', 'model', 'short_description', 'description', 'Tags', 'technical_specification', 'uses', 'warranty' , 'lead_time' , 'tax' , 'tax_type', 'is_promo' , 'is_featured' , 'is_discounted' , 'is_trending', 'status' ];

    public function productimage()
    {
        return $this->hasOne(Product_images::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function productattribute()
    {
        return $this->hasMany(Product_attribute::class);
    }
}
