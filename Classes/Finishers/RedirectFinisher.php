<?php

namespace Mediatis\FormrelaySalesforceCase\Finishers;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Exception\StopActionException;
use TYPO3\CMS\Extbase\Mvc\Exception\UnsupportedRequestTypeException;
use TYPO3\CMS\Extbase\Mvc\Web\Request;
use TYPO3\CMS\Extbase\SignalSlot\Dispatcher;
use TYPO3\CMS\Form\Domain\Finishers\RedirectFinisher as OriginalRedirectFinisher;

/**
 * The redirect post-processor
 */
class RedirectFinisher extends OriginalRedirectFinisher
{
    /**
     * @inheritdoc
     */
    protected function redirectToUri(string $uri, int $delay = 0, int $statusCode = 303)
    {
        $uri = $this->addBaseUriIfNecessary($uri);

        // add a signal slot so that the redirect target can be changed from the outside
        $signalSlotDispatcher = GeneralUtility::makeInstance(Dispatcher::class);
        $uri = $signalSlotDispatcher->dispatch(__CLASS__, 'beforeRender', [$uri, $this->request->getArguments()])[0];

        $escapedUri = htmlentities($uri, ENT_QUOTES, 'utf-8');

        $this->response->setContent('<html><head><meta http-equiv="refresh" content="' . (int)$delay . ';url=' . $escapedUri . '"/></head></html>');
        $this->response->setStatus($statusCode);
        $this->response->setHeader('Location', (string)$uri);
        throw new StopActionException('redirectToUri', 1477070964);
    }
}
