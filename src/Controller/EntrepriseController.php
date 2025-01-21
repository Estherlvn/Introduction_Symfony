<?php

namespace App\Controller;

use App\Entity\Entreprise;
use App\Repository\EntrepriseRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


final class EntrepriseController extends AbstractController
{
    #[Route('/entreprise', name: 'app_entreprise')]
    // public function index(EntityManagerInterface $entityManager): Response
    public function index(EntrepriseRepository $entrepriseRepository): Response
    {

        // $entreprises = $entityManager->getRepository(Entreprise::class)->findAll();
        //  $entreprises = $entrepriseRepository->findAll();
        // SELECT * FROM entreprise WERE ville = 'Strasbourg' ORDER BY raisonSociale ASC
        $entreprises = $entrepriseRepository->findBy([], ["raisonSociale" => "ASC"]);
        return $this->render('entreprise/index.html.twig', [
            'entreprises' => $entreprises
       
        ]);
    }


    #[Route('/entreprise/{id}', name: 'show_entreprise')]
    public function show(Entreprise $entreprise): Response
    {

        return $this->render('entreprise/show.html.twig', [
            'entreprise' => $entreprise   // entreprise au singulier
       
        ]);
    }
    


}
