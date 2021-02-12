<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UrlRedirect extends Model
{
  
    protected   $table='url_redirect';
    protected $primaryKey = "id";

    public static function findClosest($sourceUrl)
    {
        $result = DB::table("url_redirect")
        ->whereRaw("'".$sourceUrl."'"." like "."CONCAT(source_url,'%')")
        ->orderByRaw('LENGTH(source_url) DESC')->get();
        return $result->isEmpty()? null : self::find($result->first()->id);
    }
}
