<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailRequest extends Model
{
    //
    
    protected $table = 'email_request';
    protected $guarded = array('id');

    public function course()
    {
        return $this->belongsTo("App\Models\Course");
    }
}
