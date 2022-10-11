<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

    class ErrorController
    {
        public function notfound() : Response
        {
            
            $response = new Response(
                'page non trouve',
                Response::HTTP_NOT_FOUND,
                ['content-type' => 'text/html']
            );
            return $response;

        }
    }
