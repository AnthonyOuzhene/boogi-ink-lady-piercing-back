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
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        $faker->seed(806);

        //! Création des users
        $userObjects = [];

        $user = new User();
        $user->setEmail('antho@admin.com');
        $user->setPassword('$2y$13$ejHJwdxB46qRnQrS3ZS.Su4LfL8J.yAhz9ChPFpwJsPOOaYwhz5XO'); //Password : antho
        $user->setRoles(['ROLE_ADMIN']);
        $user->setName('Anthony');
        $userObjects[] = $user;
        $manager->persist($user);

        $user = new User();
        $user->setEmail('lady-karen@admin.com');
        $user->setPassword('$2y$13$ya4jGS1.dA2QFgXC5GM4Ye5aj02vF3rn.YYrMJ3lxl7st6lYXRcHG'); //Password : karen
        $user->setRoles(['ROLE_ADMIN']);
        $user->setName('LadyPiercing');
        $userObjects[] = $user;
        $manager->persist($user);

        $user = new User();
        $user->setEmail('julien@admin.com');
        $user->setPassword('$2y$13$2bFchuGqIl1IbfXirgegZOwiCawNRT5VoraBfbvbCyHhE7jLkYdV2'); //Password : julien
        $user->setRoles(['ROLE_ADMIN']);
        $user->setName('Julien');
        $userObjects[] = $user;
        $manager->persist($user);

        $user = new User();
        $user->setEmail('coconut@user.com');
        $user->setPassword('$2y$13$.TXBrTRlojV1.SIiU7H1fuoR83HuNgGIpkPsah36m5RRehSncFm1q'); //Password : coconut
        $user->setRoles(['ROLE_USER']);
        $user->setName('Best Song');
        $userObjects[] = $user;
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
        $home->setZipCode("27210");
        $home->setCity("Beuzeville");
        $home->setPhoneNumber("09.80.49.43.32");
        $home->setHomeImg('https://picsum.photos/id/200/300');
        $home->setStatus(1); // 1 is open

        $manager->persist($home);


        //! Activity
        $activityObjects = [];

        $activity = new Activity();
        $activity->setName('Piercing');
        $activity->setBrandName('Lady Piercing');
        $activity->setLogo('lady-piercing-logo.png');
        $activityObjects[] = $activity;
        $manager->persist($activity);

        $activity = new Activity();
        $activity->setName('Tatouage');
        $activity->setBrandName('Boogi\'ink');
        $activity->setLogo('boogi_ink-logo.png');
        $activityObjects[] = $activity;
        $manager->persist($activity);


        //! Services
        $serviceNumber = 25;

        // Boucle pour créer le nombre de boulangeries demandées
        for ($i = 0; $i < $serviceNumber; $i++) {

            $service = new Service();
            $service->setName($faker->word());
            $service->setPrice($faker->randomFloat(2, 10, 100));
            $service->setDescription($faker->sentence(2));
            $service->setActivityName($faker->randomElement($activityObjects));
            $service->setCategoryName($faker->randomElement($categoryObjects));

            $manager->persist($service);
        }

        // ! Gallerie
        $galleryNumber = 24;
        $galleryObjects = [];

        // Boucle pour créer le nombre de boulangeries demandées
        for ($i = 0; $i < $galleryNumber; $i++) {
            $gallery = new Gallery();
            $gallery->setName($faker->word());
            $gallery->setMainPicture('https://picsum.photos/id/' . ($i + 1) . '/200/300');
            $gallery->setPicture1('https://picsum.photos/id/' . ($i + 1) . '/200/300 ');
            $gallery->setPicture2('https://picsum.photos/id/' . ($i + 1) . '/200/300');
            $gallery->setPicture3('https://picsum.photos/id/' . ($i + 1) . '/200/300');
            $gallery->setPicture4('https://picsum.photos/id/' . ($i + 1) . '/200/300');
            $gallery->setPicture5('https://picsum.photos/id/' . ($i + 1) . '/200/300');
            $gallery->setRealisationDate($faker->dateTimeBetween('-1 years', 'now'));
            $gallery->setCategoryName($faker->randomElement($categoryObjects));
            $gallery->setActivityName($faker->randomElement($activityObjects));
            $galleryObjects[] = $gallery;
            $manager->persist($gallery);
        }

        //! Post
        $postNumber = 11;

        for ($i = 0; $i < $postNumber; $i++) {
            $post = new Post();
            $post->setTitle($faker->word());
            $post->setSummary($faker->sentence(3));
            $post->setContent($faker->paragraph(4));
            $post->setFeaturedImg('https://picsum.photos/id/' . ($i + 1) . '/600/800');
            $post->setCreatedAt($faker->dateTimeBetween('-1 years', 'now'));
            $post->setUserId($faker->randomElement($userObjects));
            $manager->persist($post);
        }

        //! Commentaires pour livre d'or
        $commentNumber = 12;

        for ($i = 0; $i < $commentNumber; $i++) {
            $comment = new Comment();
            $comment->setProjectName($faker->word());
            $comment->setRealisationDate($faker->dateTimeBetween('-1 years', 'now'));
            $comment->setTitle($faker->word());
            $comment->setMessage($faker->paragraph(2));
            $comment->setCommentDate($faker->dateTimeBetween('-1 years', 'now'));
            $comment->setUserId($faker->randomElement($userObjects));
            $comment->setActivityName($faker->randomElement($activityObjects));
            $manager->persist($comment);
        }

        $manager->flush();
    }
}
