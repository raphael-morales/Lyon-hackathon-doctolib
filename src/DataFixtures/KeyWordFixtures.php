<?php


namespace App\DataFixtures;


use App\Entity\KeyWord;
use App\Entity\BotQuestion;
use App\Entity\Specialities;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class KeyWordFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $keyWord = new KeyWord();
        $keyWord->setWord('tête');
        $keyWord->setBotQuestion($this->getReference('botQuestion'));
        $manager->persist($keyWord);
        $this->addReference('keywords', $keyWord);
        $manager->flush();
    }

    /**
     * This method must return an array of fixtures classes
     * on which the implementing class depends on
     *
     * @return class-string[]
     */
    public function getDependencies()
    {
        return [BotQuestionFixtures::class];
    }
}