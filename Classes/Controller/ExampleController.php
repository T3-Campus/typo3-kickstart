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

namespace Slavlee\CustomPackage\Controller;

use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Core\Http\ImmediateResponseException;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Frontend\Controller\ErrorController;

final class DownloadController extends ActionController
{
    /**
     * Show the success message
     * @return ResponseInterface
     */
    public function exampleAction()
    {
        $someCondition = false;

        // Example on how to throw 404 error in action function
        if ($someCondition)
        $response = GeneralUtility::makeInstance(ErrorController::class)->pageNotFoundAction(
            $this->request, 'Your error message'
        );
        throw new ImmediateResponseException($response, time());

        return $this->htmlResponse();
    }

    /**
     * Example how to store data in session
     * @param mixed $data
     */
    protected function storeSessionData(string $id, $data): void
    {
        $frontendUser = $this->request->getAttribute('frontend.user');
        $frontendUser->setKey('ses', $id, $data);
        $frontendUser->storeSessionData();
    }

    /**
     * Get data from session
     * @param string $id
     * @return mixed
     */
    protected function getSessionData(string $id)
    {
        return $this->request->getAttribute('frontend.user')->getKey('ses', $id);
    }

    /**
     * Checks if session data is present
     * @param string $id
     * @return bool
     */
    protected function hasSessionData(string $id): bool
    {
        return $this->request->getAttribute('frontend.user')->getKey('ses', $id) ? true : false;
    }

    /**
     * Remove data in session
     * @param string $id
     */
    protected function removeSessionData(string $id): void
    {
        $frontendUser = $this->request->getAttribute('frontend.user');
        $frontendUser->setKey('ses', $id, null);
        $frontendUser->storeSessionData();
    }
}
