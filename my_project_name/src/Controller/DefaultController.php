<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Entity\Video;
use App\Services\GiftsService;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class DefaultController extends AbstractController
{
    public function __construct()
    {
        // use $logger service
    }

    /**
     * @Route("/home", name="default", name="home")
     */
    public function index(Request $request): Response
    {
        //$users = [];

        //$users = $this->getDoctrine()->getRepository(User::class)->findAll();

        //if ($users) 
        //{
        //    throw $this->createNotFoundException('The users do not exist');
        //}

        //exit($request->query->get('page', 'default'));

        //exit($request->server->get('HTTP_HOST'));
        //$request->isXmlHttpRequest(); // Is it an Ajax request?
        //$request->request->get('page');
        //$request->files->get('foo'); // foo is the HTML element

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
        
       // DOCTRINE CRUD-CREATE
       /*$entityManager = $this->getDoctrine()->getManager();

       $user = new User();
       $user->setName('Robert');
       $entityManager->persist($user);
       $entityManager->flush();

       dump('A new user was saved with the id of '. $user->getId());*/

       // DOCTRINE CRUD-READ
       //$repository = $this->getDoctrine()->getRepository(User::class);
       //$user = $repository->find(1);
       //$user = $repository->findOneBy(['name' => 'Robert']);
      //$user = $repository->findOneBy(['name' => 'Robert', 'id' => 5]);
       //$users = $repository->findBy(['name' => 'Robert'], ['id' => 'DESC']);
       //$users = $repository->findAll();
       //dump($users);

       // DOCTRINE CRUD-UPDATE
       /*$entityManager = $this->getDoctrine()->getManager();
       $id = 1;
       $user = $entityManager->getRepository(User::class)->find($id);

       if (!$user)
       {
           throw $this->createNotFoundException('No user found for id '.$id);
       }
       
       $user->setName('New user name!');
       $entityManager->flush();
       dump($user);*/

       // DOCTRINE CRUD-DELETE
       /*$entityManager = $this->getDoctrine()->getManager();
       $id = 2;
       $user = $entityManager->getRepository(User::class)->find($id);
       $entityManager->remove($user);
       $entityManager->flush();*/

       //DOCTRINE RAW QUERIES
       /** @var $entityManager Doctrine\ORM\EntityManager */
       /*$entityManager = $this->getDoctrine()->getManager();
       $conn = $entityManager->getConnection();
       $sql = 'SELECT * FROM user u WHERE u.id > :id';
       $stmt = $conn->prepare($sql);
       $stmt->execute(['id' => 1]);
       dump($stmt->fetchAll());*/

       // DOCTRINE PARAM CONVERTER
       //$entityManager = $this->getDoctrine()->getManager();
       //dump($user);

       // DOCTRINE LIFECYCLECALLBACKS OPTION
       /*$entityManager = $this->getDoctrine()->getManager();
       $user = new User();
       $user->setName('Susan');
       $entityManager->persist($user);
       $entityManager->flush();*/

       // DOCTRINE ONE-TO-MANY & MANY-TO-ONE RELATIONSHIPS
       //$entityManager = $this->getDoctrine()->getManager();
       /*$user = new User();
       $user->setName('Robert');
       
       for ($i = 1; $i <= 3; $i++)
       {
           $video = new Video();
           $video->setTitle('Video title - '.$i);
           $user->addVideo($video);
           $entityManager->persist($video);
        }

       $entityManager->persist($user);
       $entityManager->flush();

        dump('Created a video with the id of '.$video->getId());
        dump('Created a user with the id of '.$user->getId());*/

        //$video = $this->getDoctrine()->getRepository(Video::class)->find(1);
        //dump($video->getUser()->getName());

        /*$user = $this->getDoctrine()->getRepository(User::class)->find(1);
        foreach($user->getVideos() as $video)
        {
            dump($video->getTitle());
        }*/

        $entityManager = $this->getDoctrine()->getManager();
        $user = $this->getDoctrine()->getRepository(User::class)->find(1);

        $video = $this->getDoctrine()->getRepository(Video::class)->find(1);

        $user->removeVideo($video);
        $entityManager->flush();
        foreach($user->getVideos() as $video)
        {
            dump($video->getTitle());
        }

        /*$entityManager->remove($user);
        $entityManager->flush();
        dump($user);*/

        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
            //'users' => $users,
            //'random_gift' => $gifts->gifts,
        ]);
    }

    public function mostPopularPosts($number = 3)
    {
        // database call:
        $posts = ['post 1', 'post 2', 'post 3', 'post 4'];
        return $this->render('default/most_popular_posts.html.twig', [
            'posts' => $posts,
        ]);
    }

    /**
     * @Route("/generate-url/{param?}", name="generate_url")
     */
    public function generate_url(): Response
    {
        exit($this->generateUrl(
            'generate_url',
            array('param' => 10),
            UrlGeneratorInterface::ABSOLUTE_URL
        ));
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

    /**
     * @Route("/download")
     */
    public function download()
    {
        $path = $this->getParameter('download_directory');
        return $this->file($path.'file.pdf');
    }

    /**
     * @Route("/redirect-test")
     */
    public function redirectTest()
    {
        return $this->redirectToRoute('route_to_redirect', array('param' => 10));
    }

    /**
     * @Route("/url-to-redirect/{param?}", name="route_to_redirect")
     */
    public function methodToRedirect()
    {
        exit('Test redirection');
    }

    /**
     * @Route("/forwarding-to-controller")
     */
    public function forwardingToController()
    {
        return $this->forward(
            'App\Controller\DefaultController::methodToForwardTo',
            array('param' => '1')
        );
    }

    /**
     * @Route("/url-to-forward-to/{param?}", name="route_to_forward_to")
     */
    public function methodToForwardTo($param)
    {
        exit('Test controller forwarding - '.$param);
    }


}
