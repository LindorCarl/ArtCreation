<?php

namespace App\Tests;

use App\Entity\Blogpost;
use DateTime;
use PHPUnit\Framework\TestCase;

class BlogpostUnitTest extends TestCase
{
    public function TestIsTrue()
    {
        $blogpost = new Blogpost();
        $datetime = new DateTime();

        $blogpost->setTitre('titre')
                ->setCreatedAt($datetime)
                ->setContenu('contenu')
                ->setSlug('slug');

        $this->assertTrue($blogpost->getTitre() === 'titre');
        $this->assertTrue($blogpost->getCreatedAt() === $datetime);
        $this->assertTrue($blogpost->getContenu() === 'contenu');
        $this->assertTrue($blogpost->getSlug() === 'slug');
    }
 
    public function TestIsFalse()
    {
        $blogpost = new Blogpost();
        $datetime = new DateTime();

        $blogpost->setTitre('titre')
                ->setCreatedAt($datetime)
                ->setContenu('contenu')
                ->setSlug('slug');

        $this->assertFalse($blogpost->getTitre() === 'titre');
        $this->assertFalse($blogpost->getCreatedAt() === $datetime);
        $this->assertFalse($blogpost->getContenu() === 'contenu');
        $this->assertFalse($blogpost->getSlug() === 'slug');
    }
 
    public function TestIsEmpty()
    {
        $blogpost = new Blogpost();
    
        $this->assertEmpty($blogpost->getTitre());
        $this->assertEmpty($blogpost->getCreatedAt());
        $this->assertEmpty($blogpost->getContenu());
        $this->assertEmpty($blogpost->getSlug());
    }
}


