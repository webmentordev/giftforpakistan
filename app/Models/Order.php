<?php

namespace App\Models;

use App\Models\User;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'order_number',
        'product_name',
        'user_id',
        'quantity',
        'price',
        'status',
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function delivery(){
        return $this->hasMany(Delivery::class, 'order_number', 'order_number');
    }

    public function customer(){
        return $this->hasOne(Customer::class, 'order_number', 'order_number');
    }
}