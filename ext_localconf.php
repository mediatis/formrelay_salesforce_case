<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

// register Hook to process data
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['formrelay']['dataProcessor'][] = \Mediatis\FormrelaySalesforceCase\Hooks\SalesForceCase::class;

$conf = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['formrelay_salesforce_case']);

// Override the default RedirectPostProcessor
$GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects'][\TYPO3\CMS\Form\Domain\Finishers\RedirectFinisher::class] = [
    'className' => \Mediatis\FormrelaySalesforceCase\Finishers\RedirectFinisher::class
];
