<?php

declare(strict_types=1);

/*
 * This file is part of the TYPO3 extension: custom_package.
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

namespace Slavlee\CustomPackage\Registry;

use TYPO3\CMS\Core\SingletonInterface;

class ContainerRegistry implements SingletonInterface
{
    public const COLUMNS_COL_1 = 200;
    public const COLUMNS_COL_2 = 201;
    public const COLUMNS_COL_3 = 202;
    public const COLUMNS_COL_4 = 203;
}
