<?php

namespace App\Controller\BlogApi;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/blog/api", name="blog_")
 */
class BlogApiController extends AbstractController
{
    /**
     * Get posts from database
     * @Route("/posts", methods={"GET"}, name="posts")
     */
    public function posts(): Response
    {
        $posts = fetch_fake_data();
        return new Response(json_encode($posts));
    }

    /**
     * @Route("/posts/{id}", methods={"GET"}, name="post_by_id")
     */
    public function post_by_id(int $id = 1): Response
    {
        $posts = fetch_fake_data();
        $idx = array_search($id, array_column($posts, 'id'));
        if ($idx) {
            return new Response(json_encode($posts[$idx]));
        } else {
            return new Response("Not found", 404);
        }
    }
}
