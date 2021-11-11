<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'SalesForce Plugin for services',
    'description' => 'Send form data to SalesForce via web2case API',
    'category' => 'be',
    'author' => '',
    'author_email' => '',
    'state' => 'beta',
    'author_company' => '',
    'version' => '3.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '10.4.0-11.5.99',
            'formrelay' => '>=5.0.0',
        ],
        'conflicts' => [
        ],
        'suggests' => [
        ],
    ],
];
