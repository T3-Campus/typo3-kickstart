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

use Slavlee\CustomPackage\Bootstrap\Base;
use Slavlee\CustomPackage\Bootstrap\Traits\ExtensionTrait;
use Slavlee\CustomPackage\Bootstrap\Traits\TcaTrait;

class ExampleModel extends Base
{
    use ExtensionTrait;
    use TcaTrait;

    public function invoke(): void
    {

    }

    /**
     * Return the TCA array
     * @return array
     */
    public function getTCA(): array
    {
        $oldImageTCA = $this->getInputTCADef(false, $this->getLLL('locallang_db.xlf:tx_bulletinboard_domain_model_pin.old_image'));
        $oldImageTCA['description'] = $this->getLLL('locallang_db.xlf:tx_bulletinboard_domain_model_pin.old_image.description');
        $oldImageTCA['config']['readOnly'] = true;

        $oldCatTCAs = [];
        $oldCatCount = 3;

        for($i = 0; $i < $oldCatCount; $i++) {
            $oldCatTCAs[$i] = $this->getInputTCADef(false, $this->getLLL('locallang_db.xlf:tx_bulletinboard_domain_model_pin.old_cat' . ($i+1)));
            $oldCatTCAs[$i]['description'] = $this->getLLL('locallang_db.xlf:tx_bulletinboard_domain_model_pin.old_cat.description');
            $oldCatTCAs[$i]['config']['readOnly'] = true;
        }

        $tca = [
            'ctrl' => [
                'title' => $this->getLLL('locallang_db.xlf:tx_bulletinboard_domain_model_pin'),
                'label' => 'title',
                'tstamp' => 'tstamp',
                'crdate' => 'crdate',
                'delete' => 'deleted',
                'default_sortby' => 'crdate DESC',
                'iconfile' => $this->getIconPath('Extension.svg'),
                'searchFields' => 'title,bodytext',
                'enablecolumns' => [
                    'disabled' => 'hidden',
                ],
                'security' => [
                    'ignorePageTypeRestriction' => true,
                ],
            ],
            'columns' => [
                'hidden' => $this->getHiddenTCADef(),
                'crdate' => $this->getCrdateTCADef(false, $this->getLLL('locallang_db.xlf:tx_bulletinboard_domain_model_pin.crdate')),
                'title' => $this->getInputTCADef(false, $this->getLLL('locallang_db.xlf:tx_bulletinboard_domain_model_pin.title')),
                'bodytext' => $this->getRTETCADef(false, $this->getLLL('locallang_db.xlf:tx_bulletinboard_domain_model_pin.bodytext')),
                'media' => $this->getMediaTCADef(false, $this->getLLL('locallang_db.xlf:tx_bulletinboard_domain_model_pin.media'), 0, 1),
                'old_image' => $oldImageTCA,
                'fe_user' => $this->getFeUserTCADef(false, $this->getLLL('locallang_db.xlf:tx_bulletinboard_domain_model_pin.fe_user'), 1, 1),
                'categories' => $this->getCategoryTCADef(false),
                'old_cat1' => $oldCatTCAs[0],
                'old_cat2' => $oldCatTCAs[1],
                'old_cat3' => $oldCatTCAs[2]
            ],
            'types' => [
                [
                    'showitem' => 'hidden,title,bodytext,media,old_image,fe_user,crdate,--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories, categories,old_cat1,old_cat2,old_cat3'
                ],
            ],
        ];

        return $tca;
    }
}
