<?php

namespace App\Controller;

use App\Entity\Offre;
use App\Form\OffreType;
use App\Repository\OffreRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\Form\Extension\HttpFoundation\HttpFoundationRequestHandler;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class JobController extends AbstractController
{
    #[Route('/', name: 'app_job')]
    public function index(OffreRepository $offreRepository): Response {

        return $this->render('job/index.html.twig',
         [ 'offres' => $offreRepository->findAll(),
         
]); }

    #[Route('show/{id}', name: 'app_job_show', requirements: ['id' => '\d+'])]
    public function show(Offre $offre): Response {
        
        return $this->render('job/show.html.twig', [ 'offre' => $offre,
    ]); }

    #[Route('/new', name: 'app_job_new')]
    public function new(HttpFoundationRequest $request, EntityManagerInterface $em): Response {
        

        $offre = new Offre();
        $form = $this->createForm(OffreType::class, $offre) ;
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            //dd($offre);
            $em->persist($offre);
            $em->flush();
            return $this->redirectToRoute('app_job_show', 
            [ 'id' => $offre->getId()
]);
        }
         
        return $this->render('job/new.html.twig', [
            'form' => $form->createView(),
            ]);
    }

}
