<?php

declare(strict_types=1);

/*
 * This file is part of the TYPO3 extension: deutscher_staedtetag_package.
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

namespace Slavlee\CustomPackage\Bootstrap;

use TYPO3\CMS\Extbase\Utility\ExtensionUtility;
use Slavlee\CustomPackage\Bootstrap\Traits\ExtensionTrait;

class ExtLocalconf extends Base
{
    use ExtensionTrait;

    /**
     * Does the main class purpose
     */
    public function invoke()
    {
        $this->registerRTEPresets();
    }

    /**
     * Register new RTE presets
     */
    private function registerRTEPresets()
    {
        $GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets'][$this->extensionKey]
            = 'EXT:' . $this->extensionKey . '/Configuration/RTE/Default.yaml';
    }
}
