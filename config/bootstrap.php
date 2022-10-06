<?php

use Dotenv\Dotenv;

//chargement de l'autoloader de composer

require_once __DIR__ . "/../vendor/autoload.php";

//chargement des variables d'environnement

$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();
