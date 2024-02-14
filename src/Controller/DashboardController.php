<?php

namespace App\Controller;

use App\Entity\Livre;
use App\Repository\LivreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DashboardController extends AbstractController
{
	#[Route('/', name: 'app_dashboard')]
	public function index(LivreRepository $livreRepository): Response
	{
		return $this->render('dashboard/index.html.twig', [
			'controller_name' => 'DashboardController',
			'livres' => $livreRepository->findAll(),
		]);
	}

	#[Route('/Livre/{id}', name: 'app_show_livre', methods: ['GET'])]
    public function show(Livre $livre): Response
    {
        return $this->render('dashboard/show_livre.html.twig', [
            'livre' => $livre,
        ]);
    }
}
