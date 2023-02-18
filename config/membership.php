<?php

return [
    'estate' => [
        'kiambiu' => [
            'text' => env('KIAMBIU'),
            'id' => env('KIAMBIU_ID'),
        ],
        'umoja_bethel' => [
            'text' => env('UMOJA_BETHEL'),
            'id' => env('UMOJA_BETHEL_ID'),
        ],
        'kariobangi_south' => [
            'text' => env('KARIOBANGI_SOUTH_ID'),
            'id' => env('KARIOBANGI_SOUTH'),
        ],
        'chokaa_berea' => [
            'text' => env('CHOKAA_BEREA'),
            'id' => env('CHOKAA_BEREA_ID'),
        ],
        'diapora' => [
            'text' => env('DIAPORA'),
            'id' => env('DIAPORA_ID'),
        ],
    ],
    'gender' => [
        'male' => [
            'text' => env('MALE'),
            'id' => env('YES_ID'),
        ],
        'female' => [
            'text' => env('FEMALE'),
            'id' => env('NO_ID'),
        ],
    ],

    'flag' => [
        'yes' => [
            'text' => env('YES'),
            'id' => env('YES_ID')
        ],
        'no' => [
            'text' => env('NO'),
            'id' => env('NO_ID')
        ]
    ],

    'marital_status' => [
        'married' => [
            'text' => 'Married',
            'id' => 1
        ],
        'single' => [
            'text' => 'Single',
            'id' => 2
        ],
        'divorced' => [
            'text' => 'Divorced',
            'id' => 3
        ],
        'widow' => [
            'text' => 'Widow',
            'id' => 4
        ],
        'widower' => [
            'text' => 'Widower',
            'id' => 5
        ]
    ],

    'employment_status' => [
        'employed' => [
            'text' => 'Employed',
            'id' => '1'
        ],
        'unemployed' => [
            'text' => 'Unemployed',
            'id' => '2'
        ],
        'business' => [
            'text' => 'Business',
            'id' => '3'
        ]
    ],

    'occupation' => [
        'finance' => [
            'text' => 'Accounting and Finance',
            'id' => '1'
        ],
        'it' => [
            'text' => 'Information Technology',
            'id' => '2'
        ],
        'education' => [
            'text' => 'Education',
            'id' => '3'
        ],
        'business' => [
            'text' => 'Business',
            'id' => '4'
        ]
    ],

    'level_of_education' => [
        'primary' => [
            'text' => 'Primary School',
            'id' => '1'
        ],
        'high_school' => [
            'text' => 'High School/ O Level',
            'id' => '2'
        ],
        'diploma' => [
            'text' => 'Diploma Certificate',
            'id' => '3'
        ],
        'university' => [
            'text' => 'University - Bachelor"s Degree/Masters Degree/PhD',
            'id' => '4'
        ]
    ],
    'ministry' => [
        'welfare'=>[
            'id'=>1,
            'text'=>'Welfare Department'
        ],
        'hospitality'=>[
            'id'=>2,
            'text'=>'Hospitality Department'
        ],
        'protocol'=>[
            'id'=>3,
            'text'=>'Protocol $ Public Relations Department'
        ],
        'evangelism'=>[
            'id'=>4,
            'text'=>'Evangelism Department'
        ],
        'discipleship'=>[
            'id'=>5,
            'text'=>'Discipleship Department'
        ],
        'counselling'=>[
            'id'=>6,
            'text'=>'Counselling Department'
        ],
        'development'=>[
            'id'=>7,
            'text'=>'Development & Enterprise Department'
        ],
        'finance'=>[
            'id'=>8,
            'text'=>'Finance & Administration Department'
        ],
        'women'=>[
            'id'=>9,
            'text'=>'Women Department'
        ],
        'ict'=>[
            'id'=>10,
            'text'=>'Information & Communication Technology Department'
        ],
        'youth'=>[
            'id'=>11,
            'text'=>'Youth & JUvenile Department'
        ],
        'music'=>[
            'id'=>12,
            'text'=>'Music Department'
        ],
        'men'=>[
            'id'=>13,
            'text'=>"Men's Fellowship"
        ],
        'strategy'=>[
            'id'=>14,
            'text'=>'Strategy, Monitoring & Evaluation Unit'
        ],
        'audit'=>[
            'id'=>15,
            'text'=>'Audit, Risk & Compliance UNit'
        ]
    ]
];
