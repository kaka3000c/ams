<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    
    protected $table      = 'activitys';
    protected $appends = ['name'];
     public static function getList()
    {
        $data = self::get()->toArray();

        //echo self::getNameAttribute();

        return  $data;
    }
    
    
     public static function getInfo()
    {
          $data = self::where(['id' => 1])->first() ;
          
          return $data;
        
    }
    
    public static function getNameAttribute()
    {
        return $this->attributes['id'];
    }
}
