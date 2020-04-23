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
     * @Route("/albums", name="albums")
     */
    public function albums()
    {
        $url = 'https://api.deezer.com/chart/0/albums';
        $data = file_get_contents($url);
        $array = json_decode($data, true);

        return $this->render('deezer/albums.html.twig', [
            'controller_name' => 'DeezerController',
            'albums' => $array['data']
        ]);
    }

    /**
     * @Route("/radio", name="radio")
     */
    public function radio()
    {
        $url = 'https://api.deezer.com/radio';
        $data = file_get_contents($url);
        $array = json_decode($data, true);

        return $this->render('deezer/radio.html.twig', [
            'controller_name' => 'DeezerController',
            'radio' => $array['data']
        ]);
    }

    /**
     * @Route("/playlist", name="playlist")
     */
    public function playlist()
    {
        $url = 'https://api.deezer.com/chart/0/playlists';
        $data = file_get_contents($url);
        $array = json_decode($data, true);

        return $this->render('deezer/playlist.html.twig', [
            'controller_name' => 'DeezerController',
            'playlist' => $array['data']
        ]);
    }

     /**
     * @Route("/podcasts", name="podcasts")
     */
    public function podcasts()
    {
        $url = 'https://api.deezer.com/chart/0/podcasts';
        $data = file_get_contents($url);
        $array = json_decode($data, true);

        return $this->render('deezer/podcasts.html.twig', [
            'controller_name' => 'DeezerController',
            'podcasts' => $array['data']
        ]);
    }
}