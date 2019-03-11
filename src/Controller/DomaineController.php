<?php

namespace App\Controller;

use App\Entity\Domaine;
use App\Form\DomaineType;
use App\Repository\DomaineRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/domaine")
 */
class DomaineController extends Controller
{
    /**
     * @Route("/", name="domaine_index", methods={"GET"})
     */
    public function index(DomaineRepository $domaineRepository): Response
    {
        return $this->render('domaine/index.html.twig', [
            'domaines' => $domaineRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="domaine_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $domaine = new Domaine();
        $form = $this->createForm(DomaineType::class, $domaine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($domaine);
            $entityManager->flush();

            return $this->redirectToRoute('domaine_index');
        }

        return $this->render('domaine/new.html.twig', [
            'domaine' => $domaine,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="domaine_show", methods={"GET"})
     */
    public function show(Domaine $domaine): Response
    {
        return $this->render('domaine/show.html.twig', [
            'domaine' => $domaine,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="domaine_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Domaine $domaine): Response
    {
        $form = $this->createForm(DomaineType::class, $domaine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('domaine_index', [
                'id' => $domaine->getId(),
            ]);
        }

        return $this->render('domaine/edit.html.twig', [
            'domaine' => $domaine,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="domaine_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Domaine $domaine): Response
    {
        if ($this->isCsrfTokenValid('delete'.$domaine->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($domaine);
            $entityManager->flush();
        }

        return $this->redirectToRoute('domaine_index');
    }
}
