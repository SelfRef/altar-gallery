<?php

namespace App\DataFixtures\ORM;

use Doctrine\Bundle\FixturesBundle\Fixtures;
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
    $postType = new PostType();
    $postType->setName("Image");
    $postType->setController("image");
    
  }
}