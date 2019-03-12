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
    protected function render()
    {
        $signalSlotDispatcher = GeneralUtility::makeInstance(Dispatcher::class);
        $destination = $signalSlotDispatcher->dispatch(__CLASS__, 'beforeRender', [$this->destination, $this->form])[0];
        \TYPO3\CMS\Core\Utility\HttpUtility::redirect($destination);
        return;
    }
}
