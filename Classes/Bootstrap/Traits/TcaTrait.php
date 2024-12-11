<?php

declare(strict_types=1);

/*
 * This file is part of the TYPO3 extension: bulletin_board.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

namespace Slavlee\CustomPackage\Bootstrap\Traits;

trait TcaTrait
{
    public const COMMON_TYPES_FILE = 'common-file-types';
    public const COMMON_TYPES_IMAGE = 'common-image-types';
    public const COMMON_TYPES_MEDIA = 'common-media-types';

    /**
     * Name of the current db table
     * @var string
     */
    protected $dbTable = '';

    /**
     * Get standard crdate TCA def
     * @param bool $exclude
     * @param string $label
     * @param mixed $size
     * @param array $additionalConfig
     * @return array
     */
    protected function getCrdateTCADef(bool $exclude, string $label, $size = 30, array $additionalConfig = []): array
    {
        $default = [
            'exclude' => $exclude ? 1 : 0,
            'label' => $label,
            'config' => [
                'type' => 'datetime',
                'size' => $size,
                'readOnly' => 1
            ],
        ];

        if (!empty($additionalConfig)) {
            $default = \array_replace_recursive($default, $additionalConfig);
        }

        return $default;
    }

    /**
     * Get standard date TCA def
     * @param bool $exclude
     * @param string $label
     * @param mixed $size
     * @param array $additionalConfig
     * @return array
     */
    protected function getDateTCADef(bool $exclude, string $label, $size = 30, array $additionalConfig = []): array
    {
        $tca = $this->getCrdateTCADef($exclude, $label, $size, $additionalConfig);
        unset($tca['config']['readOnly']);

        return $tca;
    }

    /**
     * Return the TYPO3 Standard TCA definition for hidden field
     * @return array
     */
    protected function getHiddenTCADef(): array
    {
        return $GLOBALS['TCA']['tt_content']['columns']['hidden'];
    }

    /**
     * Get standard input TCA def
     * @param bool $exclude
     * @param string $label
     * @param mixed $size
     * @param bool $required
     * @param array $additionalConfig
     * @return array
     */
    protected function getInputTCADef(bool $exclude, string $label, $size = 30, bool $required = true, array $additionalConfig = []): array
    {
        $default =  [
            'exclude' => $exclude ? 1 : 0,
            'label' => $label,
            'config' => [
                'type' => 'input',
                'size' => $size,
                'eval' => 'trim',
                'required' => $required ? 1 : 0
            ],
        ];

        if (!empty($additionalConfig)) {
            $default = \array_replace_recursive($default, $additionalConfig);
        }

        return $default;
    }

    /**
     * Return base email TCA def
     * @param bool $exclude
     * @param string $label
     * @param array $additionalConfig
     * @return array
     */
    protected function getEmailTCADef(bool $exclude, string $label, array $additionalConfig = []): array
    {
        $default = [
            'exclude' => $exclude ? 1 : 0,
            'label' => $label,
            'config' => [
                'type' => 'email',
            ]
        ];

        if (!empty($additionalConfig)) {
            $default = \array_replace_recursive($default, $additionalConfig);
        }

        return $default;
    }

    /**
     * Return default TCA for number field
     * @param bool $exclude
     * @param string $label
     * @param mixed $size
     * @param array $additionalConfig
     * @return array
     */
    protected function getNumberTCADef(bool $exclude, string $label, $size = 30, array $additionalConfig = []): array
    {
        $default = [
            'exclude' => $exclude ? 1 : 0,
            'label' => $label,
            'config' => [
                'type' => 'number',
                'size' => $size,
                'format' => 'decimal'
            ]
        ];

        if (!empty($additionalConfig)) {
            $default = \array_replace_recursive($default, $additionalConfig);
        }

        return $default;
    }

    /**
     * Get default RTE TCA def
     * @param bool $exclude
     * @param string $label
     * @param bool $required
     * @param array $additionalConfig
     * @return array
     */
    protected function getTextareaCADef(bool $exclude, string $label, bool $required = true, array $additionalConfig = []): array
    {
        $default = $this->getRTETCADef($exclude, $label, $required, $additionalConfig);
        unset($default['config']['enableRichtext']);

        return $default;
    }

    /**
     * Get default RTE TCA def
     * @param bool $exclude
     * @param string $label
     * @param bool $required
     * @param array $additionalConfig
     * @return array
     */
    protected function getRTETCADef(bool $exclude, string $label, bool $required = true, array $additionalConfig = []): array
    {
        $default = [
            'exclude' => $exclude ? 1 : 0,
            'label' => $label,
            'config' => [
                'type' => 'text',
                'enableRichtext' => true,
                'required' => $required ? 1 : 0,
            ],
        ];

        if (!empty($additionalConfig)) {
            $default = \array_replace_recursive($default, $additionalConfig);
        }

        return $default;
    }

    /**
     * Get default RTE TCA def
     * @param bool $exclude
     * @param string $label
     * @param int $minItems
     * @param int $maxItems
     * @param array $additionalConfig
     * @return array
     */
    protected function getMediaTCADef(bool $exclude, string $label, int $minItems = 0, int $maxItems = 0, array $additionalConfig = []): array
    {
        $tca = $this->getFileTCADef($exclude, $label, $minItems, $maxItems, self::COMMON_TYPES_MEDIA, $additionalConfig);

        return $tca;
    }

    /**
     * Get default RTE TCA def
     * @param bool $exclude
     * @param string $label
     * @param int $minItems
     * @param int $maxItems
     * @param array $additionalConfig
     * @return array
     */
    protected function getImageTCADef(bool $exclude, string $label, int $minItems = 0, int $maxItems = 0, array $additionalConfig = []): array
    {
        $tca = $this->getFileTCADef($exclude, $label, $minItems, $maxItems, self::COMMON_TYPES_IMAGE, $additionalConfig);

        return $tca;
    }

    /**
     * Get default file TCA def
     * @param bool $exclude
     * @param string $label
     * @param int $minItems
     * @param int $maxItems
     * @param array $additionalConfig
     * @return array
     */
    protected function getFileTCADef(bool $exclude, string $label, int $minItems = 0, int $maxItems = 0, string $allowed = self::COMMON_TYPES_FILE, array $additionalConfig = []): array
    {
        $default = [
            'exclude' => $exclude ? 1 : 0,
            'label' => $label,
            'config' => [
                'type' => 'file',
                'minitems' => $minItems,
                'maxitems' => $maxItems,
                'allowed' => $allowed,
            ],
        ];

        if (!empty($additionalConfig)) {
            $default = \array_replace_recursive($default, $additionalConfig);
        }

        return $default;
    }

    /**
     * Get default TCA def for fe_users page
     * @param bool $exclude
     * @param string $label
     * @param int $minItems
     * @param int $maxItems
     * @param array $additionalConfig
     * @return array
     */
    protected function getFeUserTCADef(bool $exclude, string $label, int $minItems = 0, int $maxItems = 0, array $additionalConfig = []): array
    {
        $default = [
            'exclude' => $exclude ? 1 : 0,
            'label' => $label,
            'config' => [
                'type' => 'group',
                'allowed' => 'fe_users',
                'internal_type' => 'db',
                'minitems' => $minItems,
                'maxitems' => $maxItems,
            ],
        ];

        if (!empty($additionalConfig)) {
            $default = \array_replace_recursive($default, $additionalConfig);
        }

        return $default;
    }

    /**
     * Return simple checkbox TCA def
     * @param bool $exclude
     * @param string $label
     * @param bool $required
     * @param array $additionalConfig
     * @return array
     */
    protected function getCheckTCADef(bool $exclude, string $label, bool $required, array $additionalConfig = []): array
    {
        $default = [
            'exclude' => $exclude ? 1 : 0,
            'label' => $label,
            'config' => [
                'type' => 'check',
                'items' => [
                    [
                        'label' => '',
                    ],
                ],
                'required' => $required ? 1 : 0
            ],
        ];

        if (!empty($additionalConfig)) {
            $default = \array_replace_recursive($default, $additionalConfig);
        }

        return $default;
    }

    /**
     * Create basic TCA def for json field
     * @param bool $exclude
     * @param string $label
     * @param bool $required
     * @param array $additionalConfig
     * @return array
     */
    protected function getJsonTCADef(bool $exclude, string $label, bool $required, array $additionalConfig = []): array
    {
        $default =  [
            'exclude' => $exclude ? 1 : 0,
            'label' => $label,
            'config' => [
                'type' => 'json',
                'eval' => 'trim',
                'required' => $required ? 1 : 0
            ],
        ];

        if (!empty($additionalConfig)) {
            $default = \array_replace_recursive($default, $additionalConfig);
        }

        return $default;
    }

    /**
     * Return TCA def for sys_language_uid field
     * @param array $additionalConfig
     * @return array
     */
    protected function getSysLanguageUidTCADef(array $additionalConfig = []): array
    {
        $default = [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => ['type' => 'language']
        ];

        if (!empty($additionalConfig)) {
            $default = \array_replace_recursive($default, $additionalConfig);
        }

        return $default;
    }

    /**
     * Get l10n_diffsource TCA def
     * @param array $additionalConfig
     * @return array
     */
    protected function getDiffSourceTCADef(array $additionalConfig = []): array
    {
        $default = [
            'config' => [
                'type' => 'passthrough',
            ],
        ];

        if (!empty($additionalConfig)) {
            $default = \array_replace_recursive($default, $additionalConfig);
        }

        return $default;
    }

    /**
     * Return basic slug field TCA def
     * @param bool $exclude
     * @param string $label
     * @param array $fields
     * @param string $fieldSeperator
     * @param array $additionalConfig
     * @return array
     */
    protected function getSlugTCADef(bool $exclude, string $label, array $fields, string $fieldSeperator = '/', array $additionalConfig = []): array
    {
        $default = [
            'exclude' => $exclude ? 1 : 0,
            'label' => $label,
            'config' => [
                'type' => 'slug',
                'size' => 50,
                'generatorOptions' => [
                    'fields' => $fields,
                    'fieldSeparator' => $fieldSeperator,
                    'prefixParentPageSlug' => true,
                ],
                'fallbackCharacter' => '-',
                'eval' => 'uniqueInSite',
                'default' => '',
            ],
        ];

        if (!empty($additionalConfig)) {
            $default = \array_replace_recursive($default, $additionalConfig);
        }

        return $default;
    }
}
