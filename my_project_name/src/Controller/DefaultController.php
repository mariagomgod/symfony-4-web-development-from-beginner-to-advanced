<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Entity\Video;
use App\Entity\Address;
use App\Entity\Author;
use App\Entity\File;
use App\Entity\Pdf;
use App\Services\GiftsService;
use App\Services\MySecondService;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use App\Services\ServiceInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;


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

        /*$entityManager = $this->getDoctrine()->getManager();
        $user = $this->getDoctrine()->getRepository(User::class)->find(1);

        $video = $this->getDoctrine()->getRepository(Video::class)->find(1);

        $user->removeVideo($video);
        $entityManager->flush();
        foreach($user->getVideos() as $video)
        {
            dump($video->getTitle());
        }*/

        /*$entityManager->remove($user);
        $entityManager->flush();
        dump($user);*/

        // DOCTRINE ONE-TO-ONE RELATIONSHIP
        /*$entityManager = $this->getDoctrine()->getManager();
        $user = new User();
        $user->setName('John');
        $address = new Address();
        $address->setStreet('street');
        $address->setNumber(23);
        $user->setAddress($address);
        $entityManager->persist($user);
        //$entityManager->persist($address); // required, if 'cascade:persist' is not set.
        $entityManager->flush();
        dump($user->getAddress()->getStreet());*/

        // DOCTRINE MANY-TO-MANY RELATIONSHIP
        //$entityManager = $this->getDoctrine()->getManager();
        
        /*for ($i = 1; $i <= 4; $i++)
        {
            $user = new User();
            $user->setName('Robert - ' .$i);
            $entityManager->persist($user);
        }

        $entityManager->flush();
        dump('last user id - ' .$user->getId());*/

        /*$user1 = $entityManager->getRepository(User::class)->find(1);
        $user2 = $entityManager->getRepository(User::class)->find(2);
        $user3 = $entityManager->getRepository(User::class)->find(3);
        $user4 = $entityManager->getRepository(User::class)->find(4);*/

        /*$user1->addFollowed($user2);
        $user1->addFollowed($user3);
        $user1->addFollowed($user4);
        $entityManager->flush();*/
        /*dump($user1->getFollowed()->count()); // users that I follow.                                                                       
        dump($user1->getFollowing()->count()); // users that follow me. 
        dump($user4->getFollowing()->count()); // users that user4 is following.
        dump($user3->getFollowing()->count()); // users that user3 is following.
        dump($user2->getFollowing()->count()); // users that user2 is following.*/

        // DOCTRINE QUERY BUILDER AND EAGER LOADING
        //$entityManager = $this->getDoctrine()->getManager();

        /*$user = new User();
        $user->setName('Robert');
        
        for ($i = 1; $i <= 3; $i++)
        {
            $video = new Video();
            $video->setTitle('Video title - ' .$i);
            $user->addVideo($video);
            $entityManager->persist($video);
        }

        $entityManager->persist($user);
        $entityManager->flush();*/

        //$user = $entityManager->getRepository(User::class)->findWithVideos(1);
        //dump($user);

        //DOCTRINE POLYMORPHIC QUERIES
        /*$entityManager = $this->getDoctrine()->getManager();
        $author = $entityManager->getRepository(Author::class)->findByIdWithPdf(3);
        dump($author);
        foreach($author->getFiles() as $file)
        {
            //if($file instanceof Pdf) // we get only the pdf type files which belongs to the author
            dump($file->getFileName());
        }

        $users = $this->getDoctrine()->getRepository(User::class)->findAll();*/

        // SERVICES-SETTER INJECTION FOR OPTIONAL DEPENDENCIES
        //$entityManager = $this->getDoctrine()->getManager();
        //$service->someAction();

        // SERVICES-PROPERTY INJECTION
        //$entityManager = $this->getDoctrine()->getManager();
        //$service->someAction();

        // SERVICES-LAZY SERVICES
        //$entityManager = $this->getDoctrine()->getManager();
        //dump($service->secService->someMethod());

        // SERVICE-ALIASES
        //$entityManager = $this->getDoctrine()->getManager();
        //dump($container->get('app.myservice'));

        // SERVICE-TAGS
        /*$entityManager = $this->getDoctrine()->getManager();
        $user = $entityManager->getRepository(User::class)->find(1);
        $user->setName('Rob');
        $entityManager->persist($user);
        $entityManager->flush();*/

        // SERVICE INTERFACE
        //$entityManager = $this->getDoctrine()->getManager();

        // CACHE BASIC USAGE
        //$entityManager = $this->getDoctrine()->getManager();
        $cache = new FilesystemAdapter();
        $posts = $cache->getItem('database.get_posts');
        if (!$posts->isHit())
        {
           $posts_from_db = ['post 1', 'post 2', 'post 3']; 
           dump('connected with database ...');
           $posts->set(serialize($posts_from_db));
           $posts->expiresAfter(5);
           $cache->save($posts);
        }
        //$cache->deleteItem('database.get_posts');
        $cache->clear();
        dump(unserialize($posts->get()));

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
