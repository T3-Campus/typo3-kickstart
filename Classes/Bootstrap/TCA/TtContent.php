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

namespace Slavlee\CustomPackage\Bootstrap\TCA;

use TYPO3\CMS\Extbase\Utility\ExtensionUtility;
use Slavlee\CustomPackage\Bootstrap\Base;

class TtContent extends Base
{
    /**
     * Does the main class purpose
     */
    public function invoke(): void
    {
        $this->registerPlugins();
    }

    /**
     * ExtensionUtility::registerPlugin
     */
    private function registerPlugins(): void
    {
        $pluginSignature = ExtensionUtility::registerPlugin(
            $this->getExtensionKeyAsNamespace(),
            'Upload',
            $this->getLLL('locallang_plugins.xlf:upload.title'),
        );

        $this->registerFlexform($pluginSignature, 'Upload.xml');

        ExtensionUtility::registerPlugin(
            $this->getExtensionKeyAsNamespace(),
            'Download',
            $this->getLLL('locallang_plugins.xlf:download.title'),
        );
    }
}
