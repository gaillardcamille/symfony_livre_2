<?php

namespace App\Controller;

use App\Entity\CollectionLivre;
use App\Form\CollectionLivreType;
use App\Repository\CollectionLivreRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/collection/livre')]
class CollectionLivreController extends AbstractController
{
    #[Route('/', name: 'app_collection_livre_index', methods: ['GET'])]
    public function index(CollectionLivreRepository $collectionLivreRepository): Response
    {
        return $this->render('collection_livre/index.html.twig', [
            'collection_livres' => $collectionLivreRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_collection_livre_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $collectionLivre = new CollectionLivre();
        $form = $this->createForm(CollectionLivreType::class, $collectionLivre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($collectionLivre);
            $entityManager->flush();

            return $this->redirectToRoute('app_collection_livre_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('collection_livre/new.html.twig', [
            'collection_livre' => $collectionLivre,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_collection_livre_show', methods: ['GET'])]
    public function show(CollectionLivre $collectionLivre): Response
    {
        return $this->render('collection_livre/show.html.twig', [
            'collection_livre' => $collectionLivre,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_collection_livre_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, CollectionLivre $collectionLivre, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CollectionLivreType::class, $collectionLivre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_collection_livre_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('collection_livre/edit.html.twig', [
            'collection_livre' => $collectionLivre,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_collection_livre_delete', methods: ['POST'])]
    public function delete(Request $request, CollectionLivre $collectionLivre, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$collectionLivre->getId(), $request->request->get('_token'))) {
            $entityManager->remove($collectionLivre);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_collection_livre_index', [], Response::HTTP_SEE_OTHER);
    }
}
