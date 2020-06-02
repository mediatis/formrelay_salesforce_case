<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

call_user_func(function() {
    $registry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\Mediatis\Formrelay\Service\Registry::class);
    $registry->registerDestination(\Mediatis\FormrelaySalesforceCase\Destination\SalesforceCase::class);

    $GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects'][\TYPO3\CMS\Form\Domain\Finishers\RedirectFinisher::class] = [
        'className' => \Mediatis\FormrelaySalesforceCase\Finishers\RedirectFinisher::class
    ];
});
