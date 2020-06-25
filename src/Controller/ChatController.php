<?php

namespace App\Controller;

use App\Repository\BotQuestionRepository;
use App\Repository\KeyWordRepository;
use App\Service\Extractor;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class ChatController extends AbstractController
{
    /**
     * @Route("/", name="chat_index")
     * @return Response
     */
    public function index() :Response
    {
        return $this->render('Chat/index.html.twig');
    }

    /**
     * @Route("/hello")
     * @param BotQuestionRepository $botQuestionRepository
     * @param Extractor $extractor
     * @param KeyWordRepository $keyWordRepository
     * @return Response
     */
    public function botQuestion (BotQuestionRepository $botQuestionRepository, Extractor $extractor, KeyWordRepository $keyWordRepository)
    {
        $hello = $botQuestionRepository->findOneBy(['Question' => 'Comment puis-je vous aider?']);

        if ($_POST){
            $question = $_POST['input'];
            $extract = $extractor->extractKeyWord($question, $keyWordRepository);
            dump($extract);
            die();
        }





        return $this->render('Chat/index.html.twig', [
            'hello' => $hello->getQuestion()
        ]);
    }
}