<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Blogpost;
use App\Entity\Categorie;
use App\Entity\Peinture;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{

    // Pour éviter des erreurs, "UserPasswordEncoderInterface" est remplacé par "UserPasswordHasher"
    private UserPasswordHasherInterface $encoder;

    public function __construct(UserPasswordHasherInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        // Ajout => Utilisation de Faker
        $faker = Factory::create('fr_FR');

        //Creation d'un utilisateur
        $user = new User();

        $user->setEmail('user@test.com')
            ->setPrenom($faker->firstName())
            ->setNom($faker->lastName())
            ->setTelephone($faker->phoneNumber())
            ->setAPropos($faker->text())
            ->setInstagram('instagram')
            ->setRoles(['ROLE_PEINTRE']);
        
        $password = $this->encoder->hashPassword($user, 'password');
        $user->setPassword($password);

        $manager->persist($user);

        // Création de 10 Blogpost.
        for ($i = 0; $i < 10; $i++) {
            $blogpost = new Blogpost();

            $blogpost->setTitre($faker->words(3, true))
                ->setCreatedAt(\DateTimeImmutable::createFromMutable($faker->dateTime))
                ->setContenu($faker->text(350))
                ->setSlug($faker->slug(3))
                // Pour l'id de l'utilisateur.
                ->setUser($user);

            $manager->persist($blogpost);
        }

        // Les peintures sont classées par categorie.
        for ($k= 0; $k < 5; $k++) {
            $categorie = new Categorie();
    
                $categorie->setNom($faker->word())
                    ->setDescription($faker->words(10, true))
                    ->setSlug($faker->slug());
    
                $manager->persist($categorie);
            
            // Création de 2 peintures/categorie.
            for ($j= 0; $j < 2; $j++) {
                
                $peinture = new Peinture();

                $peinture->setNom($faker->words(3, true))
                    ->setLargeur($faker->randomFloat(2, 20, 60))
                    ->setHauteur($faker->randomFloat(2, 20, 60))
                    ->setEnVente($faker->randomElement([true, false]))
                    ->setDateRealisation(\DateTimeImmutable::createFromMutable($faker->dateTime))
                    ->setCreatedAt(\DateTimeImmutable::createFromMutable($faker->dateTime))
                    ->setDescription($faker->text())
                    ->setPortfolio($faker->randomElement([true, false]))
                    ->setSlug($faker->slug())
                    ->setFile('https://picsum.photos/200/300')
                    ->addCategorie($categorie)
                    ->setPrix($faker->randomFloat(2, 100, 9999))
                    ->setUser($user);
                
                $manager->persist($peinture);
    
            }
        }

        // Pour insérer les données en BDD.
        $manager->flush();
    }
}
