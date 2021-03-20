<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Encryptable;

class Enquiry extends Model
{
    use SoftDeletes;
    use Encryptable;
    protected   $table='enquiry';
    protected $primaryKey = "id";
    protected $encryptable = [
                                "name",
                                "email",
                                "phone",
                                "address"
                            ];
    public function country()
    {
        return $this->belongsTo("App\Models\Country",'country_id')->withDefault();
    }

    public function toArray()
    {
        $output = parent::toArray();
        $output['name'] = $this->name;
        $output['email'] = $this->email;
        $output['phone'] = $this->phone;
        $output['address'] = $this->address;
        return $output;
    }
}


