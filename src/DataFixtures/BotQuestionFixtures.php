<?php


namespace App\DataFixtures;


use App\Entity\BotQuestion;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;


class BotQuestionFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $botQuestion = new BotQuestion();
        $botQuestion->setQuestion('Comment puis-je vous aider?');
        $manager->persist($botQuestion);

        $botQuestion = new BotQuestion();
        $botQuestion->setQuestion('Depuis combien de temps avez-vous mal?');
        $manager->persist($botQuestion);

        $this->addReference('botQuestion', $botQuestion);

        $manager->flush();
    }
}
