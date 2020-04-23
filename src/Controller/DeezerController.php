<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DeezerController extends AbstractController
{
    /**
     * @Route("/deezer", name="deezer")
     */
    public function index()
    {
        $url = 'https://api.deezer.com/artist/' . rand(1, 100) . '/albums';
        $data = file_get_contents($url);
        $array = json_decode($data, true);

        return $this->render('deezer/index.html.twig', [
            'controller_name' => 'DeezerController',
            'albums' => $array['data']
        ]);
    }

    /**
     * @Route("/genres", name="genres")
     */
    public function genres()
    {
        $url = 'https://api.deezer.com/genre';
        $data = file_get_contents($url);
        $array = json_decode($data, true);

        return $this->render('deezer/genres.html.twig', [
            'controller_name' => 'DeezerController',
            'genres' => $array['data']
        ]);
    }

    /**
     * @Route("/genres/{id}", name="genre")
     */
    public function genre($id)
    {
        $url = 'https://api.deezer.com/genre/' . $id;
        $data = file_get_contents($url);
        $array = json_decode($data, true);

        $urlArtists = 'https://api.deezer.com/genre/' . $id . '/artists';
        $dataArtists = file_get_contents($urlArtists);
        $arrayArtists = json_decode($dataArtists, true);

        return $this->render('deezer/genre.html.twig', [
            'controller_name' => 'DeezerController',
            'genre' => $array,
            'genreArtists' => $arrayArtists['data']
        ]);
    }

    /**
     * @Route("/artistes", name="artistes")
     */
    public function artistes()
    {
        $url = 'https://api.deezer.com/chart/0/artists';
        $data = file_get_contents($url);
        $array = json_decode($data, true);

        return $this->render('deezer/artistes.html.twig', [
            'controller_name' => 'DeezerController',
            'artistes' => $array['data']
        ]);
    }

    /**
     * @Route("/morceaux", name="morceaux")
     */
    public function morceaux()
    {
        $url = 'https://api.deezer.com/chart/0/tracks';
        $data = file_get_contents($url);
        $array = json_decode($data, true);

        return $this->render('deezer/morceaux.html.twig', [
            'controller_name' => 'DeezerController',
            'morceaux' => $array['data']
        ]);
    }

}