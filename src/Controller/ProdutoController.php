<?php

namespace App\Controller;

use App\Entity\Produto;
use App\Repository\CategoriaRepository;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProdutoController extends AbstractController
{
    /**
     * @Route("/produto", name="produto_index")
     */
    public function index(EntityManagerInterface $em, CategoriaRepository $categoriaRepository)
    {
        $categoria = $categoriaRepository->find(1); // 1 = categoria Informatica.
        $produto = new Produto();
        $produto->setNomeproduto('Notebook');
        $produto->setValor(3000);
        $produto->setCategoria($categoria);

        $msg = '';

        try {
            $em->persist($produto); // salvar a persistência em nível de memória.
            $em->flush(); // executa em definitivo no banco de dados.
            $msg = 'Produto cadastrada com sucesso';
        } catch (Exception $e) {
            $msg = 'Erro ao cadastrar produto';
        }

        return new Response('<h1>'.$msg.'<h1>');
    }
}
