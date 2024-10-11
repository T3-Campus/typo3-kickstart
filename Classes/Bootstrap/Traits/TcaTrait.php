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

namespace Wacon\BulletinBoard\Bootstrap\Traits;

trait TcaTrait
{
    public const COMMON_TYPES_FILE = 'common-file-types';
    public const COMMON_TYPES_IMAGE = 'common-image-types';
    public const COMMON_TYPES_MEDIA = 'common-media-types';

    /**
     * Get standard crdate TCA def
     * @param bool $exclude
     * @param string $label
     * @param mixed $size
     * @return array
     */
    protected function getCrdateTCADef(bool $exclude, string $label, $size = 30): array
    {
        return [
            'exclude' => $exclude,
            'label' => $label,
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime',
                'size' => $size,
                'readOnly' => 1
            ],
        ];
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
     * @return array
     */
    protected function getInputTCADef(bool $exclude, string $label, $size = 30): array
    {
        return [
            'exclude' => $exclude,
            'label' => $label,
            'config' => [
                'type' => 'input',
                'size' => $size,
                'eval' => 'trim'
            ],
        ];
    }

    /**
     * Get default RTE TCA def
     * @param bool $exclude
     * @param string $label
     * @return array
     */
    protected function getRTETCADef(bool $exclude, string $label): array
    {
        return [
            'exclude' => $exclude,
            'label' => $label,
            'config' => [
                'type' => 'text',
                'enableRichtext' => true,
            ],
        ];
    }

    /**
     * Get default RTE TCA def
     * @param bool $exclude
     * @param string $label
     * @param int $minItems
     * @param int $maxItems
     * @return array
     */
    protected function getMediaTCADef(bool $exclude, string $label, int $minItems = 0, int $maxItems = 0): array
    {
        $tca = $this->getFileTCADef($exclude, $label, $minItems, $maxItems, self::COMMON_TYPES_MEDIA);

        return $tca;
    }

    /**
     * Get default RTE TCA def
     * @param bool $exclude
     * @param string $label
     * @param int $minItems
     * @param int $maxItems
     * @return array
     */
    protected function getImageTCADef(bool $exclude, string $label, int $minItems = 0, int $maxItems = 0): array
    {
        $tca = $this->getFileTCADef($exclude, $label, $minItems, $maxItems, self::COMMON_TYPES_IMAGE);

        return $tca;
    }

    /**
     * Get default file TCA def
     * @param bool $exclude
     * @param string $label
     * @param int $minItems
     * @param int $maxItems
     * @return array
     */
    protected function getFileTCADef(bool $exclude, string $label, int $minItems = 0, int $maxItems = 0, string $allowed = self::COMMON_TYPES_FILE): array
    {
        return [
            'exclude' => $exclude,
            'label' => $label,
            'config' => [
                'type' => 'file',
                'minitems' => $minItems,
                'maxitems' => $maxItems,
                'allowed' => $allowed,
            ],
        ];
    }

    /**
     * Get default TCA def for fe_users page
     * @param bool $exclude
     * @param string $label
     * @param int $minItems
     * @param int $maxItems
     * @return array
     */
    protected function getFeUserTCADef(bool $exclude, string $label, int $minItems = 0, int $maxItems = 0): array
    {
        return [
            'exclude' => $exclude,
            'label' => $label,
            'config' => [
                'type' => 'group',
                'allowed' => 'fe_users',
                'internal_type' => 'db',
                'minitems' => $minItems,
                'maxitems' => $maxItems,
            ],
        ];
    }
}