<?php

namespace App\Controller;

use App\Entity\Employe;
use App\Form\EmployeType;
use App\Repository\EmployeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class EmployeController extends AbstractController
{
    #[Route('/employe', name: 'app_employe')]

     public function index(EmployeRepository $employeRepository): Response
    {
        // $employes = $employeRepository->findAll();
        // SELECT * FROM employe ORDER BY nom ASC
        $employes = $employeRepository->findBy([], ['nom'=>'ASC']); // [] indique qu’il n’y a aucun critère de filtrage.
        return $this->render('employe/index.html.twig', [
            'employes' => $employes
       
        ]);
    }

    #[Route('/employe/new', name: 'new_employe')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
    $employe = new Employe();

    $form = $this->createForm(EmployeType::class, $employe);

    // soumisson du formulaire et insertion en bdd
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {

        $employe = $form->getData();

        $entityManager->persist($employe); // persist (= prepare, en PDO)
        // actually executes the queries (INSERT query)
        $entityManager->flush(); // flush: envoyer en  bdd (= execute, en PDO)


    return $this->redirectToRoute('app_employe');
    }

    return $this->render('employe/new.html.twig', [
        'formAddEmploye' => $form,
    ]);
}

    
    #[Route('/employe/{id}', name: 'show_employe')]
    public function show(Employe $employe): Response
    {

        return $this->render('employe/show.html.twig', [
            'employe' => $employe   // employe au singulier
       
        ]);
    }
    
}
