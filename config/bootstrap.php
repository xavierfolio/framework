<?php

use Dotenv\Dotenv;

//chargement de l'autoloader de composer

require_once __DIR__ . "/../vendor/autoload.php";

//chargement des variables d'environnement

$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

//chargement du conteneur de dependances

$container = require_once __DIR__ ."/dependenciesInjection/container.php";
