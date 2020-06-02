<?php

namespace Mediatis\FormrelaySalesforceCase\Destination;

use Mediatis\Formrelay\DataDispatcher\RequestDispatcher;
use Mediatis\Formrelay\Destination\AbstractDestination;

class SalesforceCase extends AbstractDestination
{
    public function getExtensionKey(): string
    {
        return 'tx_formrelay_salesforce_case';
    }

    protected function getDispatcher(array $conf, array $data, array $context)
    {
        $salesForceUrl = $conf['salesForceUrl'];
        return $this->objectManager->get(RequestDispatcher::class, $salesForceUrl);
    }
}
