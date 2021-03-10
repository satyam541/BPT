<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Certification extends Model
{
    use SoftDeletes;
    protected $table = 'certification';
    protected $primaryKey = "id";

    public function topic()
    {
        return $this->hasMany('App\Models\CertificationTopic');
    }
}
