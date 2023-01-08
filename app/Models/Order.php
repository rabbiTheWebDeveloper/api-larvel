<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','shop_id','order_no','customer_name','customer_phone','customer_address','order_status','advance','cod','invoice_print','courier_entry','return_order_date','return_order_note'];

    public function order_details()
    {
        return $this->hasMany(OrderDetails::class)->with('product');
    }
public function customer()
{
return $this->belongsTo(User::class, 'customer_id');
}
    
}
