<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderItem extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable=[
        'order_id',
        'product_id',
        'product',
        'amazing_sale_id',
        'amazing_sale_object',
        'amazing_sale_discount_amount',
        'number',
        'final_product_price',
        'final_total_price',
        'color_id',
        'guarantee_id',
    ];

    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function single_product(){
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function amazingSale(){
        return $this->belongsTo(AmazingSale::class ,'amazing_sale_id');
    }

    public function color(){
        return $this->belongsTo(ProductColor::class, 'color_id');
    }

    public function guarantee(){
        return $this->belongsTo(Guarantee::class);
    }

    public function orderItemAttributes(){
        return $this->hasMany(OrderItemSelectedAttributes::class);
    }
}
