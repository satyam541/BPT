<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderLineItem extends Model
{
    //
    protected $table = 'order_line_item';
    protected $guarded = array('id');


    public function order()
    {
        return $this->belongsTo("App\Models\Order",'order_id');
    }

    public function delegate()
    {
        return $this->hasOne("App\Models\Delegate",'line_id');
    }

    public function delegates()
    {
        return $this->hasMany("App\Models\Delegate",'line_id');
    }

    public function addons()
    {
        return $this->hasMany("App\Models\LineItemAddon", 'line_id');
    }
}
