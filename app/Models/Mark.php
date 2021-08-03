<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Exam;
use App\Models\Section;

class Mark extends Model
{
    use HasFactory;

    public $with = ['student','subject','exam','section'];
    public $entries = ['cass1','cass2','cass3','cass4','tass'];
    
    protected $hidden ;

    public function __construct()
    {
        
        $this->hidden =  collect($this->entries)->filter(function($value){
                            if (!in_array($value,config('settings.cass'))){
                                return $value;
                            }
                        })->toArray();
        
    }

    public function student(){
        return $this->belongsTo(Student::class);
    }

    public function subject(){
        return $this->belongsTo(Subject::class);
    }

    public function exam(){
        return $this->belongsTo(Exam::class);
    }

    public function section(){
        return $this->belongsTo(Section::class);
    }
}
