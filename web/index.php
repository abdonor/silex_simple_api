<?php

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

$app['debug'] = true;

$arr = [
    0 => [
        'date'      => date('Y-m-d'),
        'author'    => 'Abdonor',
        'title'     => 'Using Silex',
        'body'      => "This is the sample of using Silex! <br> Try also: <b> <a href='/user'> /user  </a> </b>",
    ],
];

$app->get('/', function () use ($arr) {
    $output = '';
    foreach ($arr as $post) {
        $output .= '<H1>'.$post['title'].'</H1>';
        $output .= '<br />';
        $output .= $post['body'];
    }

    return $output;
});


$app->get('/user', function () use ($arr, $app) {
    $output = [
        'people' => [
            [
                'name' => 'Albert Abdonor',
                'age'  => '31',
                'profession' => 'Software Engineer',
                'adjective' => 'Handsome',
                'login' => 'albert.abdonor',
                'password' => 'holland2016',
            ],
            [
                'name' => 'Jair Bolsonaro',
                'age'  => '61',
                'profession' => 'Politician',
                'adjective' => 'Honest',
                'login' => 'jair.myth',
                'password' => 'anticommunism',
            ],
            [
                'name' => 'Dilma Rousseff',
                'age'  => '68',
                'profession' => 'Terrorist, ex-president',
                'adjective' => 'Thief, robber, communist',
                'login' => 'fidelita.castro',
                'password' => 'myassiscommunist',
            ]
        ]
    ];

    return $app->json($output,200);
});

$app->run();