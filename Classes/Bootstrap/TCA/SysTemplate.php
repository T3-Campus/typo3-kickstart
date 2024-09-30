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

namespace Wacon\CustomPackage\Bootstrap\TCA;

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use Wacon\CustomPackage\Bootstrap\Base;
use Wacon\CustomPackage\Bootstrap\Traits\ExtensionTrait;

class SysTemplate extends Base
{
    use ExtensionTrait;

    /**
     * Does the main class purpose
     */
    public function invoke()
    {
        $this->addStaticFiles();
    }

    /**
     * ExtensionManagementUtility::addStaticFile
     */
    private function addStaticFiles()
    {
        ExtensionManagementUtility::addStaticFile(
            $this->extensionKey,
            'Custom Package - Base'
        );
    }
}
