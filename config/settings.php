
<?php 

return [

    //initialize school info and other relevant configurations
    // for each school to be used in the SMS

    'schools' => [
        'sms' => [
            'name' => 'SMS Academy', 
            'db' =>'sms',
        ],
        'other' => [
            'name' => "Other Int'l Academy",
            'db' => 'otherdb'
        ],

    ],

    'terms' => ['first','second','third'],
    'cass' =>['cass1','cass2','tass'],
    'cass1'=>['max'=>20],
    'cass2'=>['max'=>20],
    'tass' =>['max'=>60],

];

?>