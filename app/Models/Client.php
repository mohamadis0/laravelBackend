<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Adress;

class Client extends Model
{
    use HasFactory;

    protected $table="clients";
    protected $fillable=[
        'contact_number'
    ];

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
        
    // }
    // public function adress()
    // {
    //     return $this->hasMany(Adress::class);
    // }
    public function orders(){
        return $this->hasMany(Order::class);
    }
}
