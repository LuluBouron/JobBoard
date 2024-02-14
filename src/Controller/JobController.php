<?php

namespace App\Controller;

use App\Entity\Offre;
use App\Repository\OffreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class JobController extends AbstractController
{
    #[Route('/', name: 'app_job')]
    public function index(OffreRepository $offreRepository): Response {

        return $this->render('job/index.html.twig',
         [ 'offres' => $offreRepository->findAll(),
         
]); }

    #[Route('/show/{id}', name: 'app_job_show')]
    public function show(Offre $offre): Response {
        
        return $this->render('job/show.html.twig', [ 'offre' => $offre,
    ]); }

}
