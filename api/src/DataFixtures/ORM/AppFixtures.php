<?php

namespace App\DataFixtures\ORM;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Channel;
use App\Entity\Comment;
use App\Entity\Post;
use App\Entity\PostType;
use App\Entity\Role;
use App\Entity\User;
use App\Entity\Vote;

class AppFixtures extends Fixture {
  public function load(ObjectManager $manager) {
    // Types
    $imageType = new PostType();
    $imageType->setName("Image");
    $imageType->setController("image");
    $manager->persist($imageType);

    $gifType = new PostType();
    $gifType->setName("GIF");
    $gifType->setController("gif");
    $manager->persist($gifType);

    // Channels
    $topChannel = new Channel();
    $topChannel->setName("Top");
    $topChannel->setIsDynamic(false);
    $manager->persist($topChannel);

    $hotChannel = new Channel();
    $hotChannel->setName("Hot");
    $hotChannel->setIsDynamic(false);
    $manager->persist($hotChannel);

    $newChannel = new Channel();
    $newChannel->setName("New");
    $newChannel->setIsDynamic(false);
    $manager->persist($newChannel);

    // Posts
    $posts = $this->addPosts(
      $manager,
      [$imageType, $gifType],
      [$topChannel, $hotChannel, $newChannel]);
    $this->addComments($manager, $posts);
    $manager->flush();
  }

  private function addPosts(ObjectManager $manager, $types, $channels) {
    $postUrls = [
      "https://i.imgur.com/2zNnQsv.jpg",
      "https://i.imgur.com/r9ghIrS.jpg",
      "https://i.imgur.com/tHklcIw.jpg",
      "https://i.imgur.com/8KUIuwh.jpg",
      "https://i.imgur.com/3sxj8qA.jpg",
      "https://i.imgur.com/80LJcza.jpg",
      "https://i.imgur.com/GC23EFf.jpg"
    ];
    $postSources = [
      "https://imgur.com/r/cats/2zNnQsv",
      "https://imgur.com/r/cats/r9ghIrS",
      "https://imgur.com/r/cats/zjkLY",
      "https://imgur.com/r/cats/Iagay",
      "https://imgur.com/r/cats/3sxj8qA",
      "https://imgur.com/r/cats/Ltqvv",
      "https://imgur.com/r/cats/GC23EFf"
    ];
    $postTitles = [
      "Bunny and Street Boy, both rescued before Hurricane Irma in Miami.",
      "Our yet-to-be-named Maine Coon little boy.",
      "My cat likes to boop",
      "Meet my lil friend, Barry aka FaZe Barry aka Barry the Bengal.",
      "No need for a pillow, there's mom's head!",
      "Cassidy the boy cat",
      "Rowley wasn’t happy with the vet this time, but he still looks so adorable."
    ];
    $postTypes = [
      $types[0],
      $types[0],
      $types[0],
      $types[0],
      $types[0],
      $types[0],
      $types[0],
    ];
    $postDates = [
      new \DateTime("2017-09-02 18:17"),
      new \DateTime("2017-10-03 11:10"),
      new \DateTime("2017-10-05 09:01"),
      new \DateTime("2017-10-10 21:43"),
      new \DateTime("2017-11-15 23:12"),
      new \DateTime("2017-11-18 06:10"),
      new \DateTime("2017-11-18 19:09"),
    ];
    $posts = [];
    for ($i = 0; $i < 7; $i++) {
      $post = new Post();
      $post->setType($postTypes[$i]);
      $post->addChannel($channels[$i%3]);
      $post->setPath($postUrls[$i]);
      $post->setTitle($postTitles[$i]);
      $post->setSource($postSources[$i]);
      $post->setCreateDate($postDates[$i]);
      $post->setPublishDate($postDates[$i]);
      $post->setIsVisible(true);
      $manager->persist($post);
      $posts[] = $post;
    }
    return $posts;
  }
  private function addComments(ObjectManager $manager, $posts) {
    $commentTexts = [
      "Ale ładny kotek",
      "Chciałbym takiego",
      "Co za śliczność",
      "Wziąłbym do domu",
      "Kici kici",
      "Mam lepszego",
      "Co za porażka",
      "Mam podobnego",
      "Czy to na pewno kot?",
      "Ta strona jest super",
      "Idę coś zjeść",
      "Kto z 9gaga?",
      "Miodzio",
      "Śliiiiczny!!1!",
      "To za Harambe"
    ];
    $commentDates = [
      new \DateTime("2017-09-02 18:17"),
      new \DateTime("2017-10-03 11:10"),
      new \DateTime("2017-10-05 09:01"),
      new \DateTime("2017-10-10 21:43"),
      new \DateTime("2017-11-15 23:12"),
      new \DateTime("2017-11-18 06:10"),
      new \DateTime("2017-11-18 19:09"),
      new \DateTime("2017-09-02 18:17"),
      new \DateTime("2017-10-03 11:10"),
      new \DateTime("2017-10-05 09:01"),
      new \DateTime("2017-10-10 21:43"),
      new \DateTime("2017-11-15 23:12"),
      new \DateTime("2017-11-18 06:10"),
      new \DateTime("2017-11-18 19:09"),
      new \DateTime("2017-11-20 19:59"),
    ];
    $commentsCount = count($commentTexts);
    $postsCount = count($posts);
    for ($i = 0; $i < $commentsCount; $i++) {
      $comment = new Comment();
      $comment->setContent($commentTexts[$i]);
      $comment->setIsVisible(true);
      $comment->setCreateDate($commentDates[$i]);
      $comment->setPost($posts[$i%$postsCount]);
      $manager->persist($comment);
    }
  }
}