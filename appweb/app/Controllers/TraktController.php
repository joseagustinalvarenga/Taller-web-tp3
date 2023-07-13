<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class TraktController extends Controller
{
    private $apiKey = "52724ba78d1d787ef10c7580921676b1cb1ee71fe6ffc10c6f9d68b404d8c19a";

    public function index()
    {
        $movies = $this->getRecommendedMovies();
        return view('trakt/list', ['movies' => $movies]);
    }

    public function searchMovies($query)
    {
        $query = urlencode($query);
        $url = "https://api.trakt.tv/search/movie,show?query=" . $query;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json",
            "trakt-api-version: 2",
            "trakt-api-key: " . $this->apiKey
        ));

        $response = curl_exec($ch);
        curl_close($ch);

        $results = json_decode($response);

        // Pasar los resultados a la vista
        return view('trakt/list', ['movies' => $results]);
    }

    private function getRecommendedMovies()
    {
        $url = "https://api.trakt.tv/movies/trending";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json",
            "trakt-api-version: 2",
            "trakt-api-key: " . $this->apiKey
        ));

        $response = curl_exec($ch);
        curl_close($ch);

        return json_decode($response);
    }

    public function verComentarios($traktId)
    {
        $url = "https://api.trakt.tv/movies/" . $traktId . "/comments/highest";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json",
            "trakt-api-version: 2",
            "trakt-api-key: " . $this->apiKey
        ));

        $response = curl_exec($ch);
        curl_close($ch);

        $comments = json_decode($response);

        return view('trakt/comments', ['comments' => $comments]);
    }
}
