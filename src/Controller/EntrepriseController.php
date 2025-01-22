<?php

namespace App\Controller;

use App\Entity\Entreprise;
use App\Form\EntrepriseType;
use App\Repository\EntrepriseRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
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
        
    // méthode formulaire pour ajouter une entreprise
    #[Route('/entreprise/new', name: 'new_entreprise')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {

        $entreprise = new Entreprise(); // on crée un objet

        $form = $this->createForm(EntrepriseType::class, $entreprise); // on crée un formulaire à partir du FormType

        // soumisson du formulaire et insertion en bdd
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entreprise = $form->getData();

            $entityManager->persist($entreprise); // persist (= prepare, en PDO)
            // actually executes the queries (INSERT query)
            $entityManager->flush(); // flush: envoyer en  bdd (= execute, en PDO)


            return $this->redirectToRoute('app_entreprise');
        }

    return $this->render('entreprise/new.html.twig', [
        'formAddEntreprise' => $form,
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
