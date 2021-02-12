<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Encryptable;

class Delegate extends Model
{
    use SoftDeletes;
    use Encryptable;
    protected $table = 'order_delegate';
    protected $guarded = array('id');
    protected $encryptable = [
        "firstname",
        "lastname",
        "telephone",
        "email",
        "mobile"
    ];


    public function orderLineItem()
    {
        return $this->belongsTo("App\Models\OrderLineItem",'line_id');
    }
    public function toArray()
    {
        $output = parent::toArray();
        $output['firstname'] = $this->firstname;
        $output['lastname'] = $this->lastname;
        $output['telephone'] = $this->telephone;
        $output['email'] = $this->email;
        $output['mobile'] = $this->mobile;
        return $output;
    }
}