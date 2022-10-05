<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class HelloController extends AbstractController
{
    public function index(): Response
    {
        return new Response('<h1>Bem vindo ao mundo da fantasia !</h1>');
    }

    public function helloname($name): Response // vc pode passar os parametros dentro da assinatura do metodo, quantos parametros quiser.
    {
        return new Response('<h1>Gostaria de tomar um chá ? ' . $name . '</h1>');
    }
}
