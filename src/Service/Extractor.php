<?php


namespace App\Service;


use App\Repository\KeyWordRepository;

class Extractor
{
    public function extractKeyWord($input, KeyWordRepository $keyWordRepository)
    {
        $words = explode(' ', $input);
        $keyWords = $keyWordRepository->findAll();
        dump($keyWords);
        foreach ($words as $word) {
            if ($word == $keyWords[0]->getWord()){
                return $word;
            }
        }
    }
}
