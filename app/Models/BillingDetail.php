<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Encryptable;
use App\Models\Country;
class BillingDetail extends Model
{
    use Encryptable;
    protected $table = 'billing_detail';
    protected $guarded = array('id');
    protected $encryptable =    [

                                    "title",
                                    "firstname",
                                    "lastname",
                                    "address1",
                                    "address2",
                                    "city",
                                    "postcode",
                                    "province"
                                ];

    public function getNameAttribute()
    {
        return $this->firstname." ".$this->lastname;
    }

    public function country()
    {
        return $this->belongsTo('App\Models\Country','country_id');
    }

    public function customer()
    {
        return $this->belongsTo("App\Models\Customer",'customer_id');
    }

    public function order()
    {
        return $this->hasOne("App\Models\Order",'billing_id');
    }
    public function toArray()
    {
        $output = parent::toArray();
        $output['title'] = $this->title;
        $output['firstname'] = $this->firstname;
        $output['lastname'] = $this->lastname;
        $output['address1'] = $this->address1;
        $output['address2'] = $this->address2;
        $output['city'] = $this->city;
        $output['postcode'] = $this->postcode;
        $output['province'] = $this->province;
        return $output;
    }
}
