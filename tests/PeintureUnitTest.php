<?php

namespace App\Tests;

use App\Entity\Categorie;
use App\Entity\Peinture;
use App\Entity\User;
use DatetimeImmutable;
use PHPUnit\Framework\TestCase;

class PeintureUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $peinture = new Peinture();
        $datetime = new DatetimeImmutable();
        $categorie = new Categorie();
        $user = new User();

        $peinture->setNom('nom')
                ->setLargeur(20.20)
                ->setHauteur(20.20)
                ->setEnVente(true)
                ->setDateRealisation($datetime)
                ->setCreatedAt($datetime)
                ->setDescription('description')
                ->setPortfolio(true)
                ->setSlug('slug')
                ->setFile('file')
                ->addCategorie($categorie)
                ->setPrix(20.20)
                ->setUser($user);

        $this->assertTrue($peinture->getNom() === 'nom');
        $this->assertTrue($peinture->getLargeur() == 20.20);
        $this->assertTrue($peinture->getHauteur() == 20.20);
        $this->assertTrue($peinture->isEnVente() === true);
        $this->assertTrue($peinture->getDateRealisation() === $datetime);
        $this->assertTrue($peinture->getCreatedAt() === $datetime);
        $this->assertTrue($peinture->getDescription() === 'description');
        $this->assertTrue($peinture->isPortfolio() === true);
        $this->assertTrue($peinture->getSlug() === 'slug');
        $this->assertTrue($peinture->getFile() === 'file');
        $this->assertTrue($peinture->getPrix() == 20.20);
        $this->assertContains($categorie, $peinture->getCategorie());
        $this->assertTrue($peinture->getUser() === $user);
    }
     
    public function testIsFalse()
    {
        $peinture = new Peinture();
        $datetime = new DatetimeImmutable();
        $categorie = new Categorie();
        $user = new User();

        $peinture->setNom('nom')
                ->setLargeur(20.20)
                ->setHauteur(20.20)
                ->setEnVente(true)
                ->setDateRealisation($datetime)
                ->setCreatedAt($datetime)
                ->setDescription('description')
                ->setPortfolio(true)
                ->setSlug('slug')
                ->setFile('file')
                ->addCategorie($categorie)
                ->setPrix(20.20)
                ->setUser($user);

        $this->assertFalse($peinture->getNom() === 'false');
        $this->assertFalse($peinture->getLargeur() == 'false');
        $this->assertFalse($peinture->getHauteur() == 'false');
        $this->assertFalse($peinture->isEnVente() === false);
        $this->assertFalse($peinture->getDateRealisation() === 'false');
        $this->assertFalse($peinture->getCreatedAt() === 'false');
        $this->assertFalse($peinture->getDescription() === 'false');
        $this->assertFalse($peinture->isPortfolio() === false);
        $this->assertFalse($peinture->getSlug() === 'false');
        $this->assertFalse($peinture->getFile() === 'false');
        $this->assertFalse($peinture->getPrix() == 'false');
        $this->assertNotContains(new Categorie(), $peinture->getCategorie());
        $this->assertFalse($peinture->getUser() === new User());
    }
    
    public function testIsEmpty()
    {
        $peinture = new Peinture();
 
        $this->assertEmpty($peinture->getNom());
        $this->assertEmpty($peinture->getLargeur());
        $this->assertEmpty($peinture->getHauteur());
        $this->assertEmpty($peinture->isEnVente());
        $this->assertEmpty($peinture->getDateRealisation());
        $this->assertEmpty($peinture->getCreatedAt());
        $this->assertEmpty($peinture->getDescription());
        $this->assertEmpty($peinture->isPortfolio());
        $this->assertEmpty($peinture->getSlug());
        $this->assertEmpty($peinture->getFile());
        $this->assertEmpty($peinture->getPrix());
        $this->assertEmpty($peinture->getCategorie());
        $this->assertEmpty($peinture->getUser());
    }
}

