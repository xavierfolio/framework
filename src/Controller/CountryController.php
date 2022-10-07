<?php
namespace App\Controller;

    class CountryController
    {

        #[Route('/', name: 'country.index', methods: ['GET'])]
        public function index()
        {
            dd('page index');
        }
    }
