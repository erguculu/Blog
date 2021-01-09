<?php

namespace App\Controller;

use App\Entity\Post;
use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

 /**
 * @Route("/", name="post_")
 */
class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     * @return Response a response instance
     */
    public function index(PostRepository $postRepository): Response
    {
    
        $posts = $postRepository->findAll();
        return $this->render('home/index.html.twig', [
            'posts' => $posts,
            
        ]);
    }

    /**
     * @Route("/post/{id}", name="show")
     * @return Response a response instance
     */
    public function show(Post $post): Response
    {
        return $this->render('home/post.html.twig', [
            'post' => $post,
            
        ]);
    }
}
