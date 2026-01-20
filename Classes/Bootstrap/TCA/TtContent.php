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

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
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
        $this->createCustomCType();
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
            'my-icon',
            'plugins',
            $this->getLLL('locallang_plugins.xlf:upload.description'),
        );

        $this->registerFlexform($pluginSignature, 'Upload.xml');

        ExtensionUtility::registerPlugin(
            $this->getExtensionKeyAsNamespace(),
            'Download',
            $this->getLLL('locallang_plugins.xlf:download.title'),
            'my-icon',
            'plugins',
            $this->getLLL('locallang_plugins.xlf:download.description'),
        );
    }


    private function createCustomCType(): void
    {
        $customCType = 'custom_content';

        ExtensionManagementUtility::addTcaSelectItem(
            'tt_content',
            'CType',
            [
                'label' => $this->getLLL('locallang_tca.xlf:custom_content.title'),
                'value' => $customCType,
                'group' => 'default',
            ],
            'textmedia',
            'after',
        );

        // Add new CType to the list of available content elements
        $GLOBALS['TCA']['tt_content']['types'][$customCType] = [
            'showitem' => '
                --div--;General,
                    header;' . $this->getLLL('locallang_tca.xlf:custom_content.header') . ',
                    bodytext;' . $this->getLLL('locallang_tca.xlf:custom_content.bodytext') . ',
                --div--;Appearance,
                    --palette--;;frame,
                --div--;Access,
                    --palette--;;hidden,
                    --palette--;;access,
                --div--;Categories,
                    categories,
                --div--;Notes,
                    rowDescription,
            ',
        ];
    }
}
