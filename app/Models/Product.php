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
        'category_id',
    ];
    public function tags()
    {
        return $this->belongsToMany(Tag::class,table:"tag_products");
    }
    public function category(){
        return $this->belongsTo(Category::class);
       }
    public function orders(){
        return $this->belongsToMany(Order::class);
    }   
    public function ingredientMainProducts()
    {
        return $this->belongsToMany(Product::class, 'ingredients', 'ingredient_id', 'product_id');
    }

    public function ingredients()
    {
        return $this->belongsToMany(Product::class, 'ingredients', 'product_id', 'ingredient_id')->withPivot('removable');
    }

    public function addonMainProducts()
    {
        return $this->belongsToMany(Product::class, 'addons', 'addon_id', 'product_id');
    }

    public function addons()
    {
        return $this->belongsToMany(Product::class, 'addons', 'product_id', 'addon_id');
    }
    
    
    // public function addon_product()
    // {
    //     return $this->hasOne(ProductAddon::class);
    // }
}
