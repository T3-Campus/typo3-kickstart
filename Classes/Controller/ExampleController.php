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
use TYPO3\CMS\Core\Http\PropagateResponseException;
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

    public function downloadAction(): ResponseInterface
    {
        $data = [
            ['name' => 'John', 'age' => 25],
            ['name' => 'Jane', 'age' => 30],
        ];
        $resource = $this->csvUtility->write($data);
        $today = new \DateTime();
        $response = $this->responseFactory->createResponse()
            ->withHeader('Cache-Control', 'no-cache, no-store')
            ->withHeader('Content-Type', 'text/csv; charset=utf-8')
            ->withHeader('Content-Disposition', 'attachment; filename=data_' . $today->format('Ymd_Hi') . '.csv')
            ->withBody($this->streamFactory->createStreamFromResource($resource));

        throw new PropagateResponseException($response, 200);
    }
}
