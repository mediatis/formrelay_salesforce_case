<?php

namespace Mediatis\FormrelaySalesforceCase\Finishers;

/*
 * This file is part of the TYPO3 CMS project.
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

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Exception\StopActionException;
use TYPO3\CMS\Extbase\Mvc\Exception\UnsupportedRequestTypeException;
use TYPO3\CMS\Extbase\Mvc\Web\Request;
use TYPO3\CMS\Extbase\SignalSlot\Dispatcher;

/**
 * The redirect post-processor
 */
class RedirectFinisher extends \TYPO3\CMS\Form\Domain\Finishers\RedirectFinisher
{
    /**
     * TODO: This method will never be called and hast to overwrite a method in RedirectFinisher
     *
     * Redirect to a destination
     *
     * Send signal that allows changing the destination URL
     *
     * @return void
     * @throws \TYPO3\CMS\Extbase\SignalSlot\Exception\InvalidSlotException
     * @throws \TYPO3\CMS\Extbase\SignalSlot\Exception\InvalidSlotReturnException
     */
    protected function redirectToUri(string $uri, int $delay = 0, int $statusCode = 303)
    {
        if (!$this->request instanceof Request) {
            throw new UnsupportedRequestTypeException('redirect() only supports web requests.', 1471776458);
        }

        $uri = $this->addBaseUriIfNecessary($uri);
        $escapedUri = htmlentities($uri, ENT_QUOTES, 'utf-8');
        $signalSlotDispatcher = GeneralUtility::makeInstance(Dispatcher::class);
        $uri = $signalSlotDispatcher->dispatch(__CLASS__, 'beforeRender', [$uri])[0];
        $this->response->setContent('<html><head><meta http-equiv="refresh" content="' . (int)$delay . ';url=' . $escapedUri . '"/></head></html>');
        if ($this->response instanceof \TYPO3\CMS\Extbase\Mvc\Web\Response) {
            $this->response->setStatus($statusCode);
            $this->response->setHeader('Location', (string)$uri);
        }
        throw new StopActionException('redirectToUri', 1477070964);
        return;
    }
}
