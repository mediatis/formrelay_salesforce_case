<?php
if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
    'formrelay_salesforce_case',
    'Configuration/TypoScript',
    'FormRelay SalesForce Case'
);
