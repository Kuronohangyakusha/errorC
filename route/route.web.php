<?php

$TabUri = [
    '' => [
        'controller' => 'Vendor\Challenge2\controller\SecurityController',
        'action' => 'create'
    ],
    '/' => [
        'controller' => 'Vendor\Challenge2\controller\SecurityController',
        'action' => 'create'
    ],
    'login' => [
        'controller' => 'Vendor\Challenge2\controller\SecurityController',
        'action' => 'store'
    ],
    'logout' => [
        'controller' => 'Vendor\Challenge2\controller\SecurityController',
        'action' => 'logout'
    ],
    'commande' => [
        'controller' => 'Vendor\Challenge2\controller\CommandeController',
        'action' => 'index'
    ],
    'form' => [
        'controller' => 'Vendor\Challenge2\controller\CommandeController',
        'action' => 'store'
    ]
];