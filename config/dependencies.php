<?php
use DI\ContainerBuilder;
use Doctrine\ORM\EntityManagerInterface;
use Alura\Courses\Infra\EntityManagerCreator;

$builder = new ContainerBuilder();
$builder->addDefinitions([
    EntityManagerInterface::class => function() {
        return (new EntityManagerCreator())->getEntityManager();
    }
]);

$container = $builder->build();

return $container;
