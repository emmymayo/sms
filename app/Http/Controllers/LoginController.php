<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Services\MultiDatabaseHandler;
use App\Models\User;

class LoginController extends Controller
{
    public function login(Request $request, MultiDatabaseHandler $mdbHandler){

        
        try {
            $mdbHandler->setWorkingDatabase($request->school);
            if(Auth::attempt([
                'email' => $request->email,
                'password' => $request->password,
                'status' => '1',
            ],$request->remember))
                {
                    $request->session()->regenerate() ;
                    //$mdbHandler->setWorkingDatabase($request->school);
                    return redirect('dashboard');
                    
                }
        } catch (\Throwable $th) {
            //throw $th;
            return back()->withErrors(['error'=>'Wrong School']);
        }
        

            return back()->withErrors(['error'=>'Credentials do no match or wrong school selected.']);

    }

    public function logout(Request $request, MultiDatabaseHandler $mdbHandler){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $mdbHandler->clearWorkingDatabase();

        return redirect('/');

    }
}
