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
}
