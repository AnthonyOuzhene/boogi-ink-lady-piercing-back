<?php

namespace App\DataFixtures;

use App\Entity\Activity;
use App\Entity\Category;
use App\Entity\Comment;
use App\Entity\Gallery;
use App\Entity\Home;
use App\Entity\Post;
use App\Entity\Service;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        $faker->seed(806);

        //! Création des users
        $user = new User();
        $user->setEmail('antho@admin.com');
        $user->setPassword($this->passwordEncoder->encodePassword($user, 'antho'));
        $user->setRoles(['ROLE_ADMIN']);
        $user->setName('Anthony');
        $manager->persist($user);

        $user = new User();
        $user->setEmail('lady-karen@admin.com');
        $user->setPassword($this->passwordEncoder->encodePassword($user, 'karen'));
        $user->setRoles(['ROLE_ADMIN']);
        $user->setName('LadyPiercing');
        $manager->persist($user);

        $user = new User();
        $user->setEmail('julien@admin.com');
        $user->setPassword($this->passwordEncoder->encodePassword($user, 'julien'));
        $user->setRoles(['ROLE_ADMIN']);
        $user->setName('Julien');
        $manager->persist($user);

        $user = new User();
        $user->setEmail('coconut@user.com');
        $user->setPassword($this->passwordEncoder->encodePassword($user, 'coconut'));
        $user->setRoles(['ROLE_USER']);
        $user->setName('Best Song');
        $manager->persist($user);

        //! Création des catégories
        // tableau des catégories
        $category = [
            'Piercing oreille',
            'Piercing visage',
            'Piercing corps',
            'Piercing intime femme',
        ];

        // contiendra les catégories que l'on va créer
        $categoryObjects = [];

        foreach ($category as $currentCategory) {
            // On instancie une nouvelle catégorie
            $category = new Category();
            // On lui attribue le nom
            $category->setName($currentCategory);
            // On stocke la catégorie dans le tableau
            $categoryObjects[] = $category;
            // On l'enregistre dans le manager
            $manager->persist($category);
        }

        //! Fixtures de la Home
        $home = new Home();
        $home->setName("Boogi\'ink & Lady Piercing");
        $home->setAddress("332 rue Louis Gillain");
        $home->setZipCode("2710");
        $home->setCity("Beuzeville");
        $home->setPhoneNumber("09.80.49.43.32");
        $home->setHomeImg('https://scontent-cdg2-1.xx.fbcdn.net/v/t39.30808-6/277565016_480437413816311_6113663914161653301_n.jpg?_nc_cat=111&ccb=1-7&_nc_sid=8bfeb9&_nc_ohc=mY-fn-4Id4wAX-KhOPb&tn=02O5Eo5GCCt2NQPB&_nc_ht=scontent-cdg2-1.xx&oh=00_AfAAI3t3BMVt0cd4hSyNMld6ANMMLcRW1BC15sZL3RAapQ&oe=63971028');
        $home->setStatus(1); // 1 is open

        $manager->persist($home);


        //! Activity
        // tableau pour stocker les noms des activités
        // $activityObjects = [];

        // foreach ($activity as $currentActivity) {
        //     // On instancie une nouvelle activité
        //     $activity = new Activity();
        //     // On lui attribue le nom
        //     $activity->setName($currentActivity);
        //     // On stocke l'activité dans le tableau
        //     $activityObjects[] = $activity;
        //     // On l'enregistre dans le manager
        //     $manager->persist($activity);
        // }

        $activity = new Activity();
        $activity->setName('Piercing');
        $activity->setBrandName('Lady Piercing');
        $activity->setLogo('');
        $manager->persist($activity);

        $activity = new Activity();
        $activity->setName('Tatouage');
        $activity->setBrandName('Boogi\'ink');
        $activity->setLogo('');
        $manager->persist($activity);


        //! Services
        $service = new Service();
        $service->setName($faker->words(2));
        $service->setPrice($faker->randomFloat(2, 10, 100));
        $service->setDescription($faker->sentence(1));
        $service->setActivityName($faker->randomElement($activity));
        $service->setCategoryName($faker->randomElement($category));
        $manager->persist($service);

        // ! Gallerie

        $galleryNumber = 24;
        $galleryObjects = [];

        // Boucle pour créer le nombre de boulangeries demandées
        for ($i = 0; $i < $galleryNumber; $i++) {
            $gallery = new Gallery();
            $gallery->setName($faker->words(3));
            $gallery->setMainPicture('https://picsum.photos/id/' . ($i + 1) . '/200/300');
            $gallery->setPicture1('https://picsum.photos/id/' . ($i + 1) . '/200/300 ');
            $gallery->setPicture2('https://picsum.photos/id/' . ($i + 1) . '/200/300');
            $gallery->setPicture3('https://picsum.photos/id/' . ($i + 1) . '/200/300');
            $gallery->setPicture4('https://picsum.photos/id/' . ($i + 1) . '/200/300');
            $gallery->setPicture5('https://picsum.photos/id/' . ($i + 1) . '/200/300');
            $gallery->setRealisationDate($faker->dateTimeBetween('-1 years', 'now'));
            $gallery->setCategoryName($faker->randomElement($category));
            $gallery->setActivityName($faker->randomElement($activity));
            $galleryObjects[] = $gallery;
            $manager->persist($gallery);
        }

        //! Post

        $postNumber = 11;

        for ($i = 0; $i < $postNumber; $i++) {
            $post = new Post();
            $post->setTitle($faker->words(6));
            $post->setSummary($faker->sentence(3));
            $post->setContent($faker->paragraph(4));
            $post->setFeaturedImg('https://picsum.photos/id/' . ($i + 1) . '/600/800');
            $post->setCreatedAt($faker->dateTimeBetween('-1 years', 'now'));
            $post->setUserId($faker->randomElement($user));
            $manager->persist($post);
        }

        //! Commentaires pour livre d'or
         $commentNumber = 12;

         for ($i = 0; $i < $commentNumber; $i++) {
            $comment = new Comment();
            $comment->setProjectName($faker->words(3));
            $comment->setRealisationDate($faker->dateTimeBetween('-1 years', 'now'));
            $comment->setTitle($faker->words(6));
            $comment->setMessage($faker->paragraph(2));
            $comment->setCommentDate($faker->dateTimeBetween('-1 years', 'now'));
            $comment->setUserId($faker->randomElement($user));
            $comment->setActivityName($faker->randomElement($activity));
            $manager->persist($comment);
         }



        //Commande de hash du mot de passe
        //bin/console security:hash-password admin

        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
