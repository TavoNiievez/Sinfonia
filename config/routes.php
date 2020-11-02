<?php

declare(strict_types=1);

use App\Controller\HomeController;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

return static function (RoutingConfigurator $routes): void {

    $routes->add('index', '/')
        ->controller(HomeController::class)
        ->methods(['GET']);
};