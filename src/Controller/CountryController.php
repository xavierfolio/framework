<?php
namespace App\Controller;

use App\Z\Routing\Route;

    class CountryController
    {

        #[Route('/test/{id}', name: 'country.index', methods: ['GET'])]
        public function index()
        {
            dd('page index');
        }
    }
