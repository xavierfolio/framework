<?php
namespace App\Z\HttpKernel;

use Symfony\Component\HttpFoundation\Response;

    interface HttpKernelInterface
    {
/**
 * cette methode du noyau lui permet de soumettre
 * la requete et de recuperer la reponse 
 * correspondante grace au routeur
 * 
 * 
 */

        public function handleRequest(): Response;
    }