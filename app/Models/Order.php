<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    
    protected $table = 'order';
    protected $guarded = array('id');

    public function customer()
    {
        return $this->belongsTo("App\Models\Customer",'customer_id');
    }

    public function billingDetail()
    {
        return $this->belongsTo("App\Models\BillingDetail",'billing_id');
    }

    public function lineItems()
    {
        return $this->hasMany("App\Models\OrderLineItem",'order_id');
    }

    public function country()
    {
        return $this->belongsTo("App\Models\Country","country_id");
    }
}
