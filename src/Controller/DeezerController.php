<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DeezerController extends AbstractController
{
    /**
     * @Route("/albums", name="albums")
     */
    public function albums()
    {
        $url = 'https://api.deezer.com/chart/0/albums&limit=36';
        $data = file_get_contents($url);
        $array = json_decode($data, true);

        return $this->render('deezer/albums.html.twig', [
            'controller_name' => 'DeezerController',
            'albums' => $array['data']
        ]);
    }

    /**
     * @Route("/albums/{id}", name="album")
     */
    public function album($id)
    {
        $url = 'https://api.deezer.com/album/' . $id;
        $data = file_get_contents($url);
        $array = json_decode($data, true);

        return $this->render('deezer/album.html.twig', [
            'controller_name' => 'DeezerController',
            'album' => $array,
            'albumGenres' => $array["genres"]["data"],
            'albumMorceaux' => $array["tracks"]["data"],
            'albumArtist' => $array["artist"]["id"]
        ]);
    }

    /**
     * @Route("/artistes", name="artistes")
     */
    public function artistes()
    {
        $url = 'https://api.deezer.com/chart/0/artists&limit=36';
        $data = file_get_contents($url);
        $array = json_decode($data, true);

        return $this->render('deezer/artistes.html.twig', [
            'controller_name' => 'DeezerController',
            'artistes' => $array['data']
        ]);
    }

    /**
     * @Route("/artistes/{id}", name="artiste")
     */
    public function artiste($id)
    {
        $url = 'https://api.deezer.com/artist/' . $id;
        $data = file_get_contents($url);
        $array = json_decode($data, true);

        $urlTops = 'https://api.deezer.com/artist/' . $id . '/top&limit=10';
        $dataTops = file_get_contents($urlTops);
        $arrayTops = json_decode($dataTops, true);

        $urlAlbums = 'https://api.deezer.com/artist/' . $id . '/albums';
        $dataAlbums = file_get_contents($urlAlbums);
        $arrayAlbums = json_decode($dataAlbums, true);

        $urlPlaylists = 'https://api.deezer.com/artist/' . $id . '/playlists&limit=6';
        $dataPlaylists = file_get_contents($urlPlaylists);
        $arrayPlaylists = json_decode($dataPlaylists, true);

        $urlRelateds = 'https://api.deezer.com/artist/' . $id . '/related&limit=6';
        $dataRelateds = file_get_contents($urlRelateds);
        $arrayRelateds = json_decode($dataRelateds, true);

        return $this->render('deezer/artist.html.twig', [
            'controller_name' => 'DeezerController',
            'artist' => $array,
            'artistTops' => $arrayTops["data"],
            'artistAlbums' => $arrayAlbums["data"],
            'artistPlaylists' => $arrayPlaylists["data"],
            'artistRelateds' => $arrayRelateds["data"]
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
     * @Route("/playlists", name="playlists")
     */
    public function playlists()
    {
        $url = 'https://api.deezer.com/chart/0/playlists&limit=36';
        $data = file_get_contents($url);
        $array = json_decode($data, true);

        return $this->render('deezer/playlists.html.twig', [
            'controller_name' => 'DeezerController',
            'playlists' => $array['data']
        ]);
    }

    /**
     * @Route("/playlists/{id}", name="playlist")
     */
    public function playlist($id)
    {
        $url = 'https://api.deezer.com/playlist/' . $id;
        $data = file_get_contents($url);
        $array = json_decode($data, true);

        return $this->render('deezer/playlist.html.twig', [
            'controller_name' => 'DeezerController',
            'playlist' => $array,
            'playlistMorceaux' => $array["tracks"]["data"],
        ]);
    }

    /**
     * @Route("/podcasts", name="podcasts")
     */
    public function podcasts()
    {
        $url = 'https://api.deezer.com/chart/0/podcasts&limit=36';
        $data = file_get_contents($url);
        $array = json_decode($data, true);

        return $this->render('deezer/podcasts.html.twig', [
            'controller_name' => 'DeezerController',
            'podcasts' => $array['data']
        ]);
    }

    /**
     * @Route("/radios", name="radios")
     */
    public function radios()
    {
        $url = 'https://api.deezer.com/radio/top&limit=36';
        $data = file_get_contents($url);
        $array = json_decode($data, true);

        return $this->render('deezer/radios.html.twig', [
            'controller_name' => 'DeezerController',
            'radios' => $array['data']
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