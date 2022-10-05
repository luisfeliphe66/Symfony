<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TesteController extends AbstractController
{
    // Metodo com annotations normal
    /**
     * @Route("/teste", name="teste")
     */
    public function index(): Response
    {
        $data['titulo'] = 'Página do mundo';
        $data['mensagem'] = 'Aprendendo um pouco de templates no Symfony.';
        // $data['frutas'] = ['Banana', 'Laranja', 'Abacaxi', 'Morango'];

        //arry com indice
        $data['frutas'] = [
            [
                'nome' => 'Banana',
                'valor' => 1.99
            ],

            [
                'nome' => 'Laranja',
                'valor' => 2.99
            ]
        ];

        return $this->render('teste/index.html.twig', $data);
    }

    // Metodo com annotations com parametro id

    /**
     * @Route("/teste/detalhes/{id}")
     */
    public function detalhes($id): Response
    {
        $data['titulo'] = 'Página de detalhes';
        $data['id'] = $id;
        return $this->render('/teste/detalhes.html.twig', $data);
    }
}
