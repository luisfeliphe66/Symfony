<?php

namespace App\Controller;

use App\Entity\Categoria;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoriaController extends AbstractController
{
    /**
     * @Route("/categoria", name="categoria_index")
     */
    public function index(EntityManagerInterface $em): Response
    {
        // $em é um objeto que vai auxiliar a execução de ações no BD.
        $categoria = new Categoria();
        $categoria->setDescricaocategoria('informatica');
        $msg = '';

        try {
            $em->persist($categoria); // salvar a persistência em nível de memória.
            $em->flush(); // executa em definitivo no banco de dados.
            $msg = 'Categoria cadastrada com sucesso';
        } catch (Exception $e) {
            $msg = 'Erro ao cadastrar categoria';
        }

        return new Response('<h1>'.$msg.'<h1>');
    }
}
