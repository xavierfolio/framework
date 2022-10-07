<?php
namespace App\Z\Routing;

use App\Z\Routing\Route;
use App\Z\Routing\RouterInterface;
use Symfony\Component\HttpFoundation\Request;

    class Router implements RouterInterface
    {

        /**
         * Notre tableau de routes (armoire)
         *
         * @var array
         */
        private array $routes = [];

        /**
         * Cette propriété contient les paramètres de la barre d'url, s'il y en a.
         *
         * @var array
         */
        private array $parameters = [];

        /**
         * cette propriete represente l'objet request
         *
         * @var [type]
         */
        private $request;


        public function __construct(Request $request, array $controllers)
        {
            $this->request = $request;
            $this->sortRoutesByName($controllers);
        }

        /**
         * Cette méthode du routeur récupère les contrôleurs,
         * les trie et les sauvegarde dans l'armoire à routes
         * en fonction de leur nom.
         *
         * @param array $controllers
         * @return void
         */
        public function sortRoutesByName(array $controllers) : void
        {
            foreach ($controllers as $controller)
            {
                $reflectionController = new \ReflectionClass($controller);

                foreach ($reflectionController->getMethods() as $reflectionMethod) 
                {
                    $routeAttributes = $reflectionMethod->getAttributes(Route::class);

                    foreach ($routeAttributes as $routeAttribute) 
                    {
                        $route = $routeAttribute->newInstance();

                        $this->routes[$route->getName()] = [
                            'class'  => $reflectionMethod->class,
                            'method' => $reflectionMethod->name,
                            'route'  => $route
                        ];
                    }
                }
            }
        }


        /**
         * Cette méthode du routeur permet de l'exécuter
         * 
         * Et elle nous retourne une réponse qui peut être : 
         *      - nulle si l'uri de l'url ne match pas avec l'uri de la route 
         *        dont l'application attend la réception
         *      - ou un tableau contenant le contrôleur censé gérer la requête si ça match 
         *
         * @return array|null
         */
        public function run() : ?array
        {
            foreach ($this->routes as $route) 
            {
                // dd($route);
                if ( $this->matchWith($this->request->server->get('REQUEST_URI'), $route['route']->getPath()) ) 
                {
                    if ( isset($this->parameters) && !empty($this->parameters) ) 
                    {
                        return [
                            "route" => $route,
                            "parameters" => $this->parameters
                        ];
                    }
                    else 
                    {
                        return [
                            "route" => $route,
                        ];
                    }
                }
            }

            return null;
        }


        public function matchWith($uri_url, $uri_route)
        {
            $pattern = preg_replace("#{[a-z]+}#", "([0-9a-zA-Z-_]+)+", $uri_route);
            $pattern = "#^$pattern$#";

            if (preg_match($pattern, $uri_url, $matches))
            {
                array_shift($matches);
                $this->parameters = $matches;
                return true;
            }

            return false;
        }
    }