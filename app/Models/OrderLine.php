<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderLine extends Model
{
    use HasFactory;
    protected $table='order_lines';
    protected $fillable=["quantity",'product_id','order_id'];
    public function product_addons()
    {
        return $this->hasMany(ProductAddon::class);
    }
    public function product_removes()
    {
        return $this->hasMany(ProductRemove::class);
    }
    public function products()
    {
        return $this->belongsToMany(Product::class,table:'product_orderlines');
    }
}
