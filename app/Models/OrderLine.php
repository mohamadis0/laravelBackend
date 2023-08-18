<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderLine extends Model
{
    use HasFactory;
    protected $table='order_lines';
    protected $fillable=["quantity"];
    public function product_addon()
    {
        return $this->hasMany(ProductAddon::class);
    }
}
