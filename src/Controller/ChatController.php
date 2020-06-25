<?php

namespace App\Controller;

use App\Repository\BodyLocationRepository;
use App\Repository\BodySublocationRepository;
use App\Repository\BotQuestionRepository;
use App\Repository\KeyWordRepository;
use App\Repository\SymptomRepository;
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
     * @param SymptomRepository $symptomRepository
     * @param BodyLocationRepository $bodyLocationRepository
     * @param BodySublocationRepository $bodySublocationRepository
     * @return Response
     */
    public function botQuestion (SymptomRepository $symptomRepository,
                                 BodyLocationRepository $bodyLocationRepository,
                                 BodySublocationRepository $bodySublocationRepository
    ) {
        $hello = 'Où avez vous mal ? [Body Location]';

        $bodyLocations = $bodyLocationRepository->findAll();

/*        if ($_POST) {
            $question = $_POST['input'];
            $extract = $extractor->extractKeyWord($question, $keyWordRepository);
            $extract = $keyWordRepository->findOneBy(['Word' => $extract]);

            $symptoms = $symptomRepository->findBy(['keyword' => $extract->getId()]);
            $askSymptoms = $botQuestionRepository->findOneBy(['Question' => 'Quels sont vos symptômes ?'])->getQuestion();

            return $this->render('Chat/index.html.twig', ['symptoms' => $symptoms, 'askSymptoms' => $askSymptoms]);
        }*/

        if ($_POST) {
            if (isset($_POST['response'])) {
                $location = $_POST['response'];
                $id = $bodyLocationRepository->findOneBy(['name'=> $location])->getId();
                $subLocations = $bodySublocationRepository->findBy(['bodyLocation' => $id ]);

                return $this->render('Chat/index.html.twig', ['subLocations'=> $subLocations]);
            }

            if (isset($_POST['response2'])) {
                $subloc = $_POST['response2'];
                $id = $bodySublocationRepository->findOneBy(['name' => $subloc]);
                $symptoms = $symptomRepository->findBy(['bodySublocation' => $id]);

                return $this->render('Chat/index.html.twig', ['symptoms'=> $symptoms]);

            }
        }





        return $this->render('Chat/index.html.twig', [
            'hello' => $hello,
            'bodyLocations' => $bodyLocations
        ]);
    }
}
