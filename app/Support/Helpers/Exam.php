<?php 

namespace App\Support\Helpers;

use App\Models\Setting;

class Exam {

   public static function defaultSkills(){
       return [
        ['name'=> 'Handwriting','value' => 5,'max' => 5, 'min' => 1],
        ['name'=> 'Communication','value' => 5,'max' => 5, 'min' => 1],
        ['name'=> 'Punctuality','value' => 5,'max' => 5, 'min' => 1],
       ] ;
   }

   public static function isRegistrationOpen(){
       return (bool) SchoolSetting::getSchoolSetting('exam.registration.open');
   }

   public static function isExamLocked(){
       return (bool) SchoolSetting::getSchoolSetting('exam.locked');
   }

   public static function isUsingAttendanceSystem(){
       return (bool) SchoolSetting::getSchoolSetting('use.attendance.system');
   }
    
}


?>