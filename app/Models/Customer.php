<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Encryptable;

class Customer extends Model
{
    use Encryptable;
    protected $table = 'customer';
    protected $guarded = array('id');
    protected $encryptable =    [
                                    "firstname",
                                    "lastname",
                                    "telephone",
                                    "mobile",
                                    "email"
                                ];

    public function orders()
    {
        return $this->hasMany("App\Models\Order");
    }

    public function billingdetail()
    {
        return $this->hasOne("App\Models\BillingDetail");
    }
    public function toArray()
    {
        $output = parent::toArray();
        $output['firstname'] = $this->firstname;
        $output['lastname'] = $this->lastname;
        $output['telephone'] = $this->telephone;
        $output['mobile'] = $this->mobile;
        $output['email'] = $this->email;
        return $output;
    }
}
