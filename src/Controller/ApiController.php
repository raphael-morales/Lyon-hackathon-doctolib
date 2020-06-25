<?php

namespace App\Controller;

use App\Entity\BodyLocation;
use App\Entity\BodySublocation;
use App\Repository\BodyLocationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class ApiController extends AbstractController
{
    const LANGUAGES = ['fr' => 'fr-fr', 'en' => 'en-gb', 'es' => 'es-es', 'de' => 'de-ch'];

    /**
     * @Route("/API", name="api_index")
     */
    public function index():Response
    {
        $bodyLocations = $this->getBodyLocation('fr');

        return $this->render('API/index.html.twig', ['bodyLocations' => $bodyLocations]);

    }


    public function getBodyLocation(string $language): array
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://priaid-symptom-checker-v1.p.rapidapi.com/body/locations?language=". self::LANGUAGES[$language],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "x-rapidapi-host: priaid-symptom-checker-v1.p.rapidapi.com",
                "x-rapidapi-key: 40a66d47a4mshff1a14197f18c3bp1f4d02jsne12e77f2fa5b"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        }
        return json_decode($response);
    }

    public function getBodySubLocation(int $id, string $language): array
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://priaid-symptom-checker-v1.p.rapidapi.com/body/locations/$id?language=". self::LANGUAGES[$language],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "x-rapidapi-host: priaid-symptom-checker-v1.p.rapidapi.com",
                "x-rapidapi-key: 40a66d47a4mshff1a14197f18c3bp1f4d02jsne12e77f2fa5b"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        }
        return json_decode($response);
    }

    /**
     * @return mixed
     * @Route("/apitest")
     */
    public function getSymptomsByBodySubLocation(): Response
    {
        $gender = 'man';

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://priaid-symptom-checker-v1.p.rapidapi.com/symptoms/15/$gender?language=fr-fr",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "x-rapidapi-host: priaid-symptom-checker-v1.p.rapidapi.com",
                "x-rapidapi-key: 40a66d47a4mshff1a14197f18c3bp1f4d02jsne12e77f2fa5b"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        }
        dump(json_decode($response));
        die();

        return $this->render('API/index.html.twig');
    }

    /**
     * @Route("/API/update")
     *
     * @param EntityManagerInterface $em
     * @param BodyLocationRepository $bodys
     * @return RedirectResponse
     */
    public function updateBodyLocation(EntityManagerInterface $em, BodyLocationRepository $bodys)
    {
        $response = $this->getBodySubLocation(6, 'fr');


        foreach ($response as $location) {

//            $bodyLocation = new BodyLocation();
            $bodySubLocation = new BodySublocation();

            $bodySubLocation->setAPIId($location->ID);
            $bodySubLocation->setName($location->Name);
            $bodySubLocation->setBodyLocation($bodys->findOneBy(['API_Id' => 6]));
            $em->persist($bodySubLocation);
        }
        $em->flush();

        return $this->redirectToRoute('api_index');
    }

}
