<?php

declare(strict_types=1);

return [
    // Icon identifier
    'tx-myext-svgicon' => [
        // Icon provider class
        'provider' => \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
        // The source SVG for the SvgIconProvider
        'source' => 'EXT:my_extension/Resources/Public/Icons/mysvg.svg',
    ],
    'tx-myext-bitmapicon' => [
        'provider' => \TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
        // The source bitmap file
        'source' => 'EXT:my_extension/Resources/Public/Icons/mybitmap.png',
        // All icon providers provide the possibility to register an icon that spins
        'spinning' => true,
    ],
    'tx-myext-anothersvgicon' => [
        'provider' => \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
        'source' => 'EXT:my_extension/Resources/Public/Icons/anothersvg.svg',
        // Since TYPO3 v12.0 an extension that provides icons for broader
        // use can mark such icons as deprecated with logging to the TYPO3
        // deprecation log. All keys (since, until, replacement) are optional.
        'deprecated' => [
            'since' => 'my extension v2',
            'until' => 'my extension v3',
            'replacement' => 'alternative-icon',
        ],
    ],
];
