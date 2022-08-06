<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Articles;
use App\Form\ArticlesType;
use App\Repository\ArticlesRepository;

class AccueilController extends AbstractController
{
    #[Route('/', name: 'app_accueil', methods: ['GET'])]
    public function index(ArticlesRepository $articlesRepository): Response
    {

        return $this->render('index.html.twig', [
            'articles' => $articlesRepository->findAllByDate(),
        ]);
    }
}
