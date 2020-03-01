<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {
    
    protected $fillable = [
        "customer_name",
        "customer_email",
        "customer_mobile",
        "status"
    ];

    public function detail()
    {
        return $this->hasOne(OrderDetail::class);
    }
}
