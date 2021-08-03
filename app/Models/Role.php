<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public function users(){
        return $this->hasMany(User::class);
    }

    public function admins(){
        return $this->hasManyThrough(Admin::class,User::class);
    }

    public function teachers(){
        return $this->hasManyThrough(Teacher::class,User::class);
    }

    public function students(){
        return $this->hasManyThrough(Student::class,User::class);
    }
}
