<?php

    namespace App\Controller;

    use Symfony\Component\HttpFoundation\Response; // to use return new Response; $composer require symfony/http-foundation
    use Symfony\Component\Routing\Annotation\Route; //using annotation $composer require sensio/framework-extra-bundle

    class command {

        /**
         * @Route("/")
         */
        public function show() {
            return new Response('milosz');
        }
    }