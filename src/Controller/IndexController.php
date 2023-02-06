<?php

namespace App\Controller;

use App\Repository\MenuRepository;
use App\Repository\TimeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    #[Route('/', name: 'app_index')]
    public function index(MenuRepository $menuRepository, TimeRepository $timeRepository): Response
    {
        $menu = $menuRepository->findAll();
        $time = $timeRepository->findAll();

        $NAVBAR = 0;
        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
            'times' => $time,
            'menu' => $menu,
            'NAVBAR' => $NAVBAR
            ]);
    }
}