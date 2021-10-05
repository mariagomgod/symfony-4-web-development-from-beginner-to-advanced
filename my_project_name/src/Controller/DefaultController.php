<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Services\GiftsService;

class DefaultController extends AbstractController
{
    #[Route('/', name: 'default')]
    public function index(GiftsService $gifts): Response
    {
        //$users = [];

        $users = $this->getDoctrine()->getRepository(User::class)->findAll();

       //$entityManager->flush(); // flush() save all the users in the database

        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
            'users' => $users,
            'random_gift' => $gifts->gifts,
        ]);
    }

}
