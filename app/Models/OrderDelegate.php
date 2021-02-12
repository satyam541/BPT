<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Encryptable;

class OrderDelegate extends Model
{
    use Encryptable;
    protected $table='order_delegate';
    protected $encryptable = [
        'firstname',
        'lastname',
        'telephone',
        'email',
        'mobile'
    ];
}
