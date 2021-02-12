<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TopicContent extends Model
{
    use SoftDeletes;
    protected $table    = 'topic_country_content';
    protected $guarded  = array('id');

    public function topic()
    {
        return $this->belongsTo('App\Models\Topic','topic_id');
    }

    public function country()
    {
        return $this->belongsTo('App\Models\Country',"country_id");
    }
}