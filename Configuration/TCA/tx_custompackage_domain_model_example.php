<?php

declare(strict_types=1);

$tx_bulletinboard_domain_model_pin = new \Slavlee\CustomPackage\Bootstrap\TCA\Example();
$tx_bulletinboard_domain_model_pin->invoke();

return $tx_bulletinboard_domain_model_pin->getTCA();
