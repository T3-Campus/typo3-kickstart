<?php
$EM_CONF[$_EXTKEY] = [
    'title' => 'Custom Extension',
    'description' => 'Custom Extension Description',
    'category' => 'template',
    'author' => 'Kevin Chileong Lee',
    'author_email' => 'kevin.lee@wacon.de',
    'author_company' => 'Slavlee',
    'state' => 'stable',
    'version' => '1.15.0',
    'constraints' => [
        'depends' => [
            'typo3' => '12.4.0-12.4.99',
        ],
        'conflicts' => [
        ],
        'suggests' => [
        ],
    ],
    'autoload' => [
        'psr-4' => [
            'Slavlee\\CustomPackage\\' => 'Classes'
        ]
    ],
];
