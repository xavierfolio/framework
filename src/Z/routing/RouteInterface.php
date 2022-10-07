<?php
namespace App\Z\Routing;

    Interface RouteInterface
    {

        /**
         * Cette méthode permet de récupérer l'uri de la route
         * 
         * L'uri de la route, c'est chemin de la route
         *  dont l'application attend la réception
         *
         * @return string
         */
        public function getPath() : string;


        /**
         * Cette méthode permet de récupérer le nom de la route
         *
         * @return string
         */
        public function getName() : string;


        /**
         * Cette méthode permet de récupérer les méthodes ou verbes 
         * avec lesquels l'on peut accéder à la route 
         *
         * @return array
         */
        public function getMethods() : array;


        /**
         * Cette méthode vérifie si l'url de la route contient des paramètres
         */
        public function hasParams() : bool;


        /**
         * Cette méthode récupère dans la clé du tableau des paramètres,
         * leur nom
         *
         * @return array
         */
        public function fetchParams() : array;
        
    }