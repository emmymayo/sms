<?php 

namespace App\Support\Helpers;

use App\Models\Setting;

class SchoolSetting {

    public static function getSchoolSetting($key){
        return Setting::where('key',$key)->first()->value;
    }

    public static function setSchoolSetting($key,$value=''){
        $school_setting = Setting::where('key',$key)->first();
        $school_setting->value = $value;
        return $school_setting->save();

    }
}


?>