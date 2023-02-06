<?php

namespace App\Controller;

use App\Entity\Booking;
use App\Form\BookingType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BookingController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/réservation', name: 'app_reserve')]
    public function index(Request $request): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_REMEMBERED');
        $user = $this->getUser();
        $email = $user->getEmail();
        $booking = new Booking();
        $form = $this->createForm(BookingType::class, $booking);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $booking = $form->getData();
            $booking->setEmail($email);

            $this->entityManager->persist($booking);
            $this->entityManager->flush();

            $this->addFlash(
                'success',
                'Votre réservation a bien été prise en compte, à bientôt dans notre restaurant !'
            );
            return $this->redirectToRoute('app_index');

        }

        $NAVBAR = 2;

        return $this->render('reserve/index.html.twig', [
            'booking' => $booking,
            'NAVBAR' => $NAVBAR,
            'form' => $form->createView()
        ]);
    }
}
