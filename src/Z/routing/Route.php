<?php
namespace App\Z\Routing;

use App\Z\Routing\RouteInterface;

    #[\Attribute(\Attribute::TARGET_METHOD)]
    class Route implements RouteInterface
    {

        /**
         * Cette propriété contient les paramètres de la route, s'il en y a.
         *
         * @var array
         */
        private array $params = [];


        /**
         * Cette propriété représente l'uri de la route
         *
         * @var string
         */
        private string $path;


        /**
         * Cette propriété représente le nom de la route
         *
         * @var string
         */
        private string $name;


        /**
         * Cette propriété représente les méthodes de la route
         *
         * @var string
         */
        private string $methods;


        /**
         * A chaque fois qu'une route est créée, 
         * on récupère son uri, son nom et ses méthodes
         *
         * @param string $path
         * @param string $name
         * @param array $methods
         */
        public function __construct(string $path, string $name, $methods = ['GET'])
        {
            $this->path    = $path;
            $this->name    = $name;
            $this->methods = $methods;
        }


        /**
         * Cette méthode permet de récupérer l'uri de la route
         * 
         * L'uri de la route, c'est le chemin (path) de la route dont l'application attend la réception
         *
         * @return string
         */
        public function getPath() : string
        {
            return $this->path;
        }


        /**
         * Cette méthode permet de récupérer le nom de la route
         *
         * @return string
         */
        public function getName() : string
        {
            return $this->name;
        }


        /**
         * Cette méthode permet de récupérer les méthodes ou verbes
         * avec lesquels l'on peut accéder à la route 
         *
         * @return array
         */
        public function getMethods() : array
        {
            return $this->methods;
        }


        /**
         * Cette méthode vérifie si l'url de la route contient des paramètres
         */
        public function hasParams() : bool
        {

        }


        /**
         * Cette méthode récupère dans la clé du tableau des paramètres,
         * leur nom
         *
         * @return array
         */
        public function fetchParams() : array
        {
            
        }
        
    }