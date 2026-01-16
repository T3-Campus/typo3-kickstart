<?php

declare(strict_types=1);

/*
 * This file is part of the TYPO3 extension: filetransfer.
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

namespace Slavlee\CustomPackage\Utility;

class TcaUtility
{
    /**
     * Remove fields from showitem of a CType
     * @param string $fieldString
     * @param string $cType
     * @param string $table
     */
    public static function removeFieldFromCTypeShowItem(
        string $fieldString,
        string $cType,
        string $table = 'tt_content'
    ): void
    {
        $GLOBALS['TCA'][$table]['types'][$cType]['showitem'] = \str_replace($fieldString, '', $GLOBALS['TCA'][$table]['types'][$cType]['showitem']);
    }
}
