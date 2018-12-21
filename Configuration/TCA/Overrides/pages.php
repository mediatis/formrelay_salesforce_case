<?php
if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

//** Global Extension Settings
$conf = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['formrelay_salesforce_case']);
