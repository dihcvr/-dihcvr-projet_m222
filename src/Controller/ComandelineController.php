<?php

namespace App\Controller;

use App\Entity\Comandeline;
use App\Form\ComandelineType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/comandeline")
 */
class ComandelineController extends AbstractController
{
    /**
     * @Route("/", name="comandeline_index", methods={"GET"})
     */
    public function index(): Response
    {
        $comandelines = $this->getDoctrine()
            ->getRepository(Comandeline::class)
            ->findAll();

        return $this->render('comandeline/index.html.twig', [
            'comandelines' => $comandelines,
        ]);
    }

    /**
     * @Route("/new", name="comandeline_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $comandeline = new Comandeline();
        $form = $this->createForm(ComandelineType::class, $comandeline);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($comandeline);
            $entityManager->flush();

            return $this->redirectToRoute('comandeline_index');
        }

        return $this->render('comandeline/new.html.twig', [
            'comandeline' => $comandeline,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="comandeline_show", methods={"GET"})
     */
    public function show(Comandeline $comandeline): Response
    {
        return $this->render('comandeline/show.html.twig', [
            'comandeline' => $comandeline,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="comandeline_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Comandeline $comandeline): Response
    {
        $form = $this->createForm(ComandelineType::class, $comandeline);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('comandeline_index');
        }

        return $this->render('comandeline/edit.html.twig', [
            'comandeline' => $comandeline,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="comandeline_delete", methods={"POST"})
     */
    public function delete(Request $request, Comandeline $comandeline): Response
    {
        if ($this->isCsrfTokenValid('delete'.$comandeline->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($comandeline);
            $entityManager->flush();
        }

        return $this->redirectToRoute('comandeline_index');
    }
}
