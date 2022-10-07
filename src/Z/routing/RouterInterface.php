<?php
namespace App\Z\Routing;

    interface RouterInterface
    {

        /**
         * cette methode du routeur recupere les controleurs 
         * et les trie, les sauvegarde dans une armoire 
         * a routes par nom
         *
         * @return void
         */
        public function sortRoutesByName(array $controllers) :void;


        /**
         * cette methode permet de l'executer
         * et elle nous retourne une reponse:
         *     -nulle si l'uri de l'url ne match pas 
         * avec l'uri de la route
         *     -un tableau contenant le controleur 
         * censer gerer la requete si ca match
         */
        public function run() : ?array;
    }


