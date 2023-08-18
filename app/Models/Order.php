<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable= [
        'status',
        'ordered_date'
    ];
    public function products(){
        return $this->belongsToMany(Product::class);
    }   
    public function client(){
    return $this->belongsTo(Client::class);
    }
    public function orderDetails() 
    {
        return $this->hasOne(OrderDetails::class);
    }
}

