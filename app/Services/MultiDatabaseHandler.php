<?php

namespace App\Services ;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class MultiDatabaseHandler{

    public function setWorkingDatabase($db){
        Config::set('database.connections.mysql.database',$db);
        Session::put('working_db',$db);
        return true;
    }

    public function getWorkingDatabase(){
       return Session::get('working_db');
    }

    public function clearWorkingDatabase(){
        Session::forget('working_db');
        return true;
    }

    
}



?>