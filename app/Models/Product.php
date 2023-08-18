<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table='products';
    protected $fillable=[
        'name',
        'description',
        'price',
        'image',
        'quantity',
        'feature',
    ];
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
       }
    public function orders(){
        return $this->belongsToMany(Order::class);
    }   
    public function mainProducts()
    {
        return $this->belongsToMany(Product::class, 'product_product', 'related_product_id', 'main_product_id');
    }

    public function relatedProducts()
    {
        return $this->belongsToMany(Product::class, 'product_product', 'main_product_id', 'related_product_id');
    }
    
    public function addon_product()
    {
        return $this->hasOne(ProductAddon::class);
    }
}
