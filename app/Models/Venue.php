<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use File;
use Illuminate\Database\Eloquent\SoftDeletes;
class Venue extends Model
{
    use SoftDeletes;
    protected $table = 'venue';
    protected $guarded = array('id');
    public $image_path = "storage/uploads/venue/";

    public static function findByName($locationName)
    {
        return self::where('name',$locationName)->first();
    }
    
    public function getImagePath()
    {// check file exist then return default image.
        $imageLink = url($this->image_path.$this->image);
        if (file_exists(public_path($this->image_path.$this->image))) {
            return $imageLink;
        } else {
            return url('images/default.png');
        }  
    }

    public function location()
    {
        return $this->belongsTo('App\Models\Location','location_id');
    }

    public function delete()
    {
        File::delete(public_path($this->image_path.$this->image));
        return parent::delete();
    }
    
    /**
     * schedule related functions
     */
    public function customSchedulePrice()
    {
        return $this->hasMany('App\Models\CustomSchedulePrice');
    }
}