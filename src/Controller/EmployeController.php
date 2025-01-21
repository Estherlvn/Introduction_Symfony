<?php

namespace App\Controller;

use App\Entity\Employe;
use App\Repository\EmployeRepository;
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

    #[Route('/employe/{id}', name: 'show_employe')]
    public function show(Employe $employe): Response
    {

        return $this->render('employe/show.html.twig', [
            'employe' => $employe   // employe au singulier
       
        ]);
    }
    
}
