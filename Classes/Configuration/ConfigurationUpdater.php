<?php

namespace Mediatis\FormrelaySalesforceCase\Configuration;

use Mediatis\Formrelay\Configuration\RouteConfigurationUpdaterInterface;

class ConfigurationUpdater implements RouteConfigurationUpdaterInterface
{
    protected function updateUrlConfiguration(array &$routeConfiguration)
    {
        if (array_key_exists('salesForceUrl', $routeConfiguration)) {
            if (!array_key_exists('url', $routeConfiguration)) {
                $routeConfiguration['url'] = $routeConfiguration['salesForceUrl'];
            }
            unset($routeConfiguration['salesForceUrl']);
        }
    }

    public function updateRouteConfiguration(string $routeName, array &$routeConfiguration)
    {
        if ($routeName === 'salesforceCase') {
            $this->updateUrlConfiguration($routeConfiguration);
        }
    }
}
