<?php
namespace App\Services\EClass\Zoom\Meeting;

use Firebase\JWT\JWT;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;
use InvalidArgumentException;

class Meeting{
    
    protected $base_url = 'https://api.zoom.us';

    public function __construct()
    {
        
    }

    public function get($meeting_id){
        $meeting_id = (int)$meeting_id;
        $token = $this->getJWT();
        $response = Http::withToken($token)
                            ->acceptJson()
                            ->get($this->base_url.'/v2/meetings/'.$meeting_id);
        if($response->successful()){
            return $response->collect();
        }
        
        return $response->throw();
    }

    public function create($data=[]){
        
        if(!$this->hasRequiredData($data,'create'))
        {
            return new InvalidArgumentException('Required keys missing in argument '.$data.' topic, type, duration, start_time, password required');
        }

        $token = $this->getJWT();
        $response = Http::withToken($token)
                            ->acceptJson()
                            ->post($this->base_url.'/v2/users/me/meetings',$data);
        if($response->successful()){
            return $response->collect();
        }
        
        return $response->throw();
    }

    public function update($meeting_id, $data=[]){
        $token = $this->getJWT();
        $response = Http::withToken($token)
                            ->acceptJson()
                            ->patch($this->base_url.'/v2/users/me/meetings/'.$meeting_id, $data);
        if($response->successful()){
            return $response->collect();
        }
        
        return $response->throw();
    }

    public function list($next_page_token=''){
        $token = $this->getJWT();
        $response = Http::withToken($token)
                            ->acceptJson()
                            ->get($this->base_url.'/v2/users/me/meetings?next_page_token='.$next_page_token);
        if($response->successful()){
            return $response->collect();
        }
        
        return $response->throw();
    }

    public function delete($meeting_id){
        if(empty($meeting_id)){
            return new InvalidArgumentException("Meeting ID required.");
        }
        $token = $this->getJWT();
        $response = Http::withToken($token)
                            ->acceptJson()
                            ->delete($this->base_url.'/v2/users/me/meetings/'.$meeting_id);
        if($response->successful()){
            return $response->collect();
        }
        
        return $response->throw();
    }


    public function hasRequiredData($data=[],$action='create'){

        if( !isset($data['topic']) || !isset($data['type']) || 
            !isset($data['duration']) || !isset($data['start_time']) || 
            !isset($data['password'])  ){
            return false;
        }

        return true;
        
    }
    public function getJWT(){
        $key = config('settings.e-class.zoom-api-key');
        $secret = config('settings.e-class.zoom-api-secret');
        $payload = [
            'iss' => $key,
            'exp' => time() + 3600
        ];

        return JWT::encode($payload, $secret);
    }
}
