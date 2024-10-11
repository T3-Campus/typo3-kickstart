<?php

declare(strict_types=1);

return [
    \Slavlee\CustomPackage\Domain\Model\Upload::class => [
        'tableName' => 'tx_custompackage_domain_model_upload',
        'properties' => [
            'classPropertyName' => [
                'fieldName' => 'dbColumnName',
            ],
        ],
    ],
];
