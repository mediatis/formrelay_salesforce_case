<?php

namespace Mediatis\FormrelaySalesforceCase;

use FormRelay\Core\Service\RegistryInterface;
use FormRelay\SalesforceCase\SalesforceCaseInitialization;

class Initialization
{
    public function initialize(RegistryInterface $registry)
    {
        SalesforceCaseInitialization::initialize($registry);
    }
}
