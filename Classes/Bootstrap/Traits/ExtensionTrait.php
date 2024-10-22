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

namespace Slavlee\CustomPackage\Bootstrap\Traits;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

trait ExtensionTrait
{
    protected $extensionKey = 'custom_package';

    /**
     * Return the extension key in Namespace writing
     * @return string
     */
    protected function getExtensionKeyAsNamespace(): string
    {
        return GeneralUtility::underscoredToUpperCamelCase($this->extensionKey);
    }

    /**
     * Return the extension key in lower case without underscores
     * @return string
     */
    protected function getExtensionKeyForFlexforms(): string
    {
        return strtolower($this->getExtensionKeyAsNamespace());
    }

    /**
     * Return the LLL path as string
     * @param string $key
     * @return string
     */
    protected function getLLL(string $key): string
    {
        return 'LLL:EXT:' . $this->extensionKey . '/Resources/Private/Language/' . $key;
    }

    /**
     * Return the path to FlexForm file
     * @param string $filename
     * @return string
     */
    protected function getFlexformPath(string $filename): string
    {
        return 'FILE:EXT:' . $this->extensionKey . '/Configuration/Flexforms/' . $filename;
    }

    /**
     * Return the path for TsConfig files
     * @param string $filename
     * @param string $scope (Page or User)
     * @return string
     */
    protected function getTsConfigPath(string $filename, string $scope = 'Page'): string
    {
        return 'Configuration/TSconfig/' . $scope . '/StaticFile/' . $filename;
    }

    /**
     * Return path for Icons
     * @param string $fileName
     * @return string
     */
    protected function getIconPath(string $fileName): string
    {
        return 'EXT:' . $this->extensionKey . '/Resources/Public/Icons/' . $fileName;
    }

    /**
     * Register a flexform
     * @param string $pluginSignature
     * @param string $fileName
     * @return void
     */
    protected function registerFlexform(string $pluginSignature, string $fileName)
    {
        $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';

        ExtensionManagementUtility::addPiFlexFormValue(
            $pluginSignature,
            $this->getFlexformPath($fileName)
        );
    }

    /**
     * Set $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature]
     * @param string $value
     * @return void
     */
    protected function setSubtypesExcludelist(string $pluginSignature, string $value)
    {
        $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature] = $value;
    }
}