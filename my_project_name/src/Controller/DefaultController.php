<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Services\GiftsService;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default")
     */
    public function index(GiftsService $gifts, Request $request, SessionInterface $session): Response
    {
        //$users = [];

        $users = $this->getDoctrine()->getRepository(User::class)->findAll();

        //exit($request->query->get('page', 'default'));

        exit($request->server->get('HTTP_HOST'));
        $request->isXmlHttpRequest(); // Is it an Ajax request?
        $request->request->get('page');
        $request->files->get('foo'); // foo is the HTML element

        //exit($request->cookies->get('PHPSESSID'));

        //$session->set('name', 'session value');
        //$session->remove(('name'));
        //$session->clear();
        //if ($session->has('name')) 
        //{
        //    exit($session->get('name'));
        //}

        //$this->addFlash('notice', 'Your changes were saved!');

        //$this->addFlash('warning', 'Your changes were saved!');

        //$cookie = new Cookie(
        //    'my_cookie',  // Cookie name
        //    'cookie value', // Cookie value
        //    time() + (2 * 365 * 24 * 60 * 60) // Expires after 2 years
        //);

        //$response = new Response();
        //$response->headers->setCookie($cookie);
        //$response->send();

        //$response = new Response();
        //$response->headers->clearCookie('my_cookie');
        //$response->send();

       //$entityManager->flush(); // flush() save all the users in the database

        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
            'users' => $users,
            'random_gift' => $gifts->gifts,
        ]);
    }

    /**
     * @Route("/blog/{page?}", name="blog_list", requirements={"page"="\d+"})
     */
    public function index2()
    {
        return new Response('Optional parameters in url and requirements for parameters');
    }

    /**
     * @Route("/articles/{_locale}/{year}/{slug}/{category}", 
     * defaults={"category": "computers"}, 
     * requirements={
     *      "_locale"="en|fr",
     *      "category": "computers|rtv",
     *      "year": "\d+"
     *   }
     * )
     */
    public function index3()
    {
        return new Response('An advanced route example');
    }

    /**
     * @Route({
     *      "nl": "/over-ons",
     *      "en": "/about-us"
     * }, name="about_us")
     */
    public function index4()
    {
        return new Response('Translated routes');
    }

}
