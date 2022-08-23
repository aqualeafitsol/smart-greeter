<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'orders';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function orderDetails(){
        return $this->hasMany(OrderDetail::class,'order_id','id');
    }
    public function shippingDetail(){
        return $this->hasOne(ShippingAdress::class,'order_id','id');
    }
    public function getUser(){
        return $this->hasOne(User::class,'id','user_id');
    }
    public function sticker(){
        return $this->belongsTo(Sticker::class,'id','order_id');
    }
}
