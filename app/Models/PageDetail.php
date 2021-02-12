<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use File;

class PageDetail extends Model
{
    // use SoftDeletes;
    protected $table = 'page_detail';
    protected $guarded = array('id');
    protected $primaryKey = "id";
    public $image_path = 'storage/uploads/page/';

    public function delete()
    {
        File::delete(public_path($this->image_path.$this->image));
        return parent::delete();
    }

    public static function getContent($page_name)
    {
        // using laravel app method to create php stdClass
        $app = app();

        $pageDetails = self::where('page_name',$page_name)->get();

        // creating a standered object to store the result
        $result = $app->make('stdClass');
        foreach($pageDetails as $row)
        {
            $section = array();
            $sectionName = str_replace("-","_",$row->section);
            $section[$row->sub_section] = $row;
            if(empty($result->$sectionName))
            {
                // add section(array) to result using sectionName as property
                $result->$sectionName = $section;
            }
            else
            {
                // concat to array with + operator
                $result->$sectionName += $section;
            }
        }
        $result->instance = new self();
        // dd($result);
        return $result;
    }

}