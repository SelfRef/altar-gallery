<?php
namespace AppBundle\Controller\API;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Post;
use AppBundle\Entity\Channel;
/**
 * @Route("/api")
 */
class PostController extends Controller
{
  /**
   * @Route("/posts", name="getPosts")
   * @Method("GET")
   */
  public function getPostsAction(Request $request) {
    $em = $this->getDoctrine()->getManager();
    $posts = $em->getRepository(Post::class)->findAll();
    $data = [];
    $channel = $em->getRepository(Channel::class)->findAll()[0];
    foreach ($posts as $post) {
      $postData = [
        "id" => $post->getId(),
        "path" => $post->getPath(),
        "title" => $post->getTitle(),
        "source" => $post->getSource(),
        "createDate" => $post->getCreateDate(),
        "publishDate" => $post->getPublishDate(),
        "isVisible" => $post->getIsVisible(),
        "author" => null,
        "type" => [
          "id" => 1,
          "name" => "Image"
        ],
        "channels" => [ $channel ]
      ];
      $data[] = $postData;
    }
    return $this->json($data);
  }

  /**
   * @Route("/posts", name="createPost")
   * @Method("POST")
   */
  // public function createPostAction(Request $request) {
  //   $em = $this->getDoctrine()->getManager();
  //   $posts = $em->getRepository(Post::class)->findAll();
  //   return $this->json($posts);
  // }
}
