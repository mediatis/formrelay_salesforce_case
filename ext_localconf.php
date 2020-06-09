<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

call_user_func(function() {
    $registry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\Mediatis\Formrelay\Service\Registry::class);
    $registry->registerDestination(\Mediatis\FormrelaySalesforceCase\Destination\SalesforceCase::class);
});
