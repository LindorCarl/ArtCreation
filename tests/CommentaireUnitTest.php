<?php

namespace App\Tests;

use App\Entity\Blogpost;
use App\Entity\Commentaire;
use App\Entity\Peinture;
use DateTime;
use DatetimeImmutable;
use PHPUnit\Framework\TestCase;


class CommentaireUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $commentaire = new Commentaire();
        $datetime = new DatetimeImmutable();
        $blogpost = new Blogpost();
        $peinture = new Peinture();

        $commentaire->setAuteur('auteur')
                ->setEmail('true@test.com')
                ->setCreatedAt($datetime)
                ->setContenu('contenu')
                ->setBlogpost($blogpost)
                ->setPeinture($peinture);

        $this->assertTrue($commentaire->getAuteur() === 'auteur');
        $this->assertTrue($commentaire->getEmail() === 'true@test.com');
        $this->assertTrue($commentaire->getCreatedAt() === $datetime);
        $this->assertTrue($commentaire->getContenu() === 'contenu');
        $this->assertTrue($commentaire->getBlogpost() === $blogpost);
        $this->assertTrue($commentaire->getPeinture() === $peinture);
    }
     
    public function testIsFalse()
    {
        $commentaire = new Commentaire();
        $datetime = new DatetimeImmutable();
        $blogpost = new Blogpost();
        $peinture = new Peinture();

        $commentaire->setAuteur('auteur')
                ->setEmail('true@test.com')
                ->setCreatedAt($datetime)
                ->setContenu('contenu')
                ->setBlogpost($blogpost)
                ->setPeinture($peinture);

        $this->assertFalse($commentaire->getAuteur() === 'false');
        $this->assertFalse($commentaire->getEmail() === 'false@test.com');
        $this->assertFalse($commentaire->getCreatedAt() === 'false');
        $this->assertFalse($commentaire->getContenu() === 'false');
        $this->assertFalse($commentaire->getBlogpost() === 'false'); //$blogpost
        $this->assertFalse($commentaire->getPeinture() === 'false'); //$peinture
    }
    
    public function testIsEmpty()
    {
        $commentaire = new Commentaire();
    
        $this->assertEmpty($commentaire->getAuteur());
        $this->assertEmpty($commentaire->getEmail());
        $this->assertEmpty($commentaire->getCreatedAt());
        $this->assertEmpty($commentaire->getContenu());
        $this->assertEmpty($commentaire->getBlogpost());
        $this->assertEmpty($commentaire->getPeinture());
    }
}
