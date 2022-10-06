<?php

//nouvelle instance du construsteur du conteneur

$builder = new DI\ContainerBuilder();

//ajout des definitions 
//les definitions des dependance interne

$builder->addDefinitions(__DIR__ . "/dependencies.php");

//creation du contenuer grace a son builder

$container = $builder->build();

//des que le container sera appeler
//il doit noous retourner le contneur

return $container;
