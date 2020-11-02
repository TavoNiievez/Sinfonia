<?php

declare(strict_types=1);

use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $config): void {

    $config->parameters()
        ->set('app.business_shortname', '%env(BUSINESS_SHORTNAME)%')
        ->set('app.business_fullname', '%env(BUSINESS_FULLNAME)%');

    $services = $config->services();

    $services->defaults()
        ->autowire()
        ->autoconfigure();

    $services->load('App\\', '../src/*')
        ->exclude('../src/{DependencyInjection,Entity,Tests,Kernel.php}');

    $services->load('App\Controller\\', '../src/Controller')
        ->tag('controller.service_arguments');
};
