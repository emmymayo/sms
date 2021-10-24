<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserDashboardController extends Controller
{
    public function toUserDashboard(Request $request){
        if(User::find(Auth::id())->isAdmin()){
            return view('dashboards.main',[
               
                ]);
        }
        elseif(User::find(Auth::id())->isTeacher()){
            return view('dashboards.main');
        }
        elseif(User::find(Auth::id())->isStudent()){
            return view('dashboards.main');
        }
    }

}