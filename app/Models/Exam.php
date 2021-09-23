<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Session;
use App\Models\Mark;

class Exam extends Model
{
    use HasFactory;

    public function session(){
       return $this->belongsTo(Session::class);
    }

    public function isPublished(){
        if($this->published == 0){
            return false;
        }
        return true;
    }

    public function marks(){
        return $this->hasMany(Mark::class);
    }

    public function examRecords(){
        return $this->hasMany(ExamRecord::class);
    }
}
