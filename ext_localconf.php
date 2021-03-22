<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

call_user_func(function() {
    // relay initalization
    \Mediatis\Formrelay\Utility\RegistrationUtility::registerInitialization(\Mediatis\FormrelaySalesforceCase\Initialization::class);

    /** @var \TYPO3\CMS\Extbase\SignalSlot\Dispatcher $dispatcher */
    $dispatcher = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\SignalSlot\Dispatcher::class);

    // configuration updater
    $dispatcher->connect(
        \Mediatis\Formrelay\Configuration\RouteConfigurationUpdaterInterface::class,
        \Mediatis\Formrelay\Configuration\RouteConfigurationUpdaterInterface::SIGNAL_UPDATE_ROUTE_CONFIGURATION,
        \Mediatis\FormrelaySalesforceCase\Configuration\ConfigurationUpdater::class,
        'updateRouteConfiguration'
    );
});
