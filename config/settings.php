
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
    'cass3'=>['max'=>0], //not used
    'cass4'=>['max'=>0], //not used
    'tass' =>['max'=>60],

    'grades' => [
        ['from'=> 70, 'to'=> 100,'remark'=> 'Excellent','grade' =>'A'],
        ['from'=> 60, 'to'=> 69.9, 'remark' => 'V. Good','grade' => 'B'],
        ['from'=> 50, 'to'=> 59.9, 'remark' => 'Good','grade' => 'C'],
        ['from'=> 40, 'to'=> 49.9, 'remark' => 'Fair','grade' => 'D'],
        ['from'=> 0, 'to'=> 39.9, 'remark' => 'Poor','grade' => 'F'],
        
    ],

    'skills' => [
        ['name'=> 'Handwriting','value' => 5,'max' => 5, 'min' => 1],
        ['name'=> 'Verbal Fluency','value' => 5,'max' => 5, 'min' => 1],
        ['name'=> 'Games','value' => 5,'max' => 5, 'min' => 1],
        ['name'=> 'Sports','value' => 5,'max' => 5, 'min' => 1],
        ['name'=> 'Musical Skills','value' => 5,'max' => 5, 'min' => 1],
        ['name'=> 'Handling Tools','value' => 5,'max' => 5, 'min' => 1],
        ['name'=> 'Punctuality','value' => 5,'max' => 5, 'min' => 1],
        ['name'=> 'Neatness','value' => 5,'max' => 5, 'min' => 1],
        ['name'=> 'Politeness','value' => 5,'max' => 5, 'min' => 1],
        ['name'=> 'Honesty','value' => 5,'max' => 5, 'min' => 1],
        ['name'=> 'Teamwork','value' => 5,'max' => 5, 'min' => 1],
        ['name'=> 'Leadership','value' => 5,'max' => 5, 'min' => 1],
    ] 

];

?>