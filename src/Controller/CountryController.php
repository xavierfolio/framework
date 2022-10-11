<?php
namespace App\Controller;

use App\Z\Routing\Route;
use App\Z\Abstract\AbstractController;
use Symfony\Component\HttpFoundation\Response;

    class CountryController extends AbstractController
    {

        #[Route('/', name: 'country.index', methods: ['GET'])]
        public function index() : Response
        {
            $pays = "france";
            return $this->render("country/index.html.twig", ['pays' => $pays]);
        }

        #[Route('/create', name: 'country.create', methods: ['GET'])]
        public function create() : Response
        {
            $response = new Response(
                'page create',
                Response::HTTP_OK,
                ['content-type' => 'text/html']
            );
            return $response;
        }

        #[Route('/edit/{id}', name: 'country.edit', methods: ['GET'])]
        public function edit($params) : Response
        {
            $response = new Response(
                "page edit avec " . $params[0],
                Response::HTTP_OK,
                ['content-type' => 'text/html']
            );
            return $response;
        }
    }
