<?php

namespace App\Controller;

use App\Entity\Carte;
use App\Repository\CarteRepository;
use App\Repository\TimeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CarteController extends AbstractController
{
    #[Route('/carte', name: 'app_carte')]
    public function index(CarteRepository $repository, TimeRepository $timeRepository): Response
    {

        $carte = $repository->findAll();
        $time = $timeRepository->findAll();

        $NAVBAR = 1;
        return $this->render('carte/index.html.twig', [
            'controller_name' => 'CarteController',
            'times' => $time,
            'carte' => $carte,
            'NAVBAR' => $NAVBAR
        ]);
    }
}