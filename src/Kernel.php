<?php
namespace App;

use Psr\Container\ContainerInterface;
use App\Z\HttpKernel\HttpKernelInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
     * --------------------------------------------------------------------------
     * Kernel
     * 
     * C'est le noyau de notre application
     * 
     * Ses rôles pricipaux : 
     *              - Soummettre la requête
     *              - Récupérer la réponse correspondante
     *              - Retourner cette réponse au "FrontController" (index.php)
     * 
     * @author: xavier folio
     * @version: 1.0.0
     * --------------------------------------------------------------------------
    */

        class Kernel implements HttpKernelInterface
        {

            /**
             * cette propriete represente le conteneur de dependance
             *
             * @var ContainerInterface
             */
private ContainerInterface $container;

/**
 * pour toute nouvelle instance du noyau,
 * on recupere le conteneur de dependance
 */

public function __construct(ContainerInterface $container)
{
    $this->container = $container;
    // dd($this->container);
}

            /**
 * cette methode du noyau lui permet de soumettre
 * la requete et de recuperer la reponse 
 * correspondante grace au routeur
 * 
 * 
 */

        public function handleRequest(): Response
        {
            dd($this->container->get(Request::class));
        }
        }