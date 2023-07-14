<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class TraktController extends Controller
{
    private $apiKey = "52724ba78d1d787ef10c7580921676b1cb1ee71fe6ffc10c6f9d68b404d8c19a";

    public function index()
{
    $recommendations = $this->getRecommendedMovies();
    $data['recommendations'] = $recommendations;
    $data['results'] = []; // Inicialmente, los resultados de búsqueda están vacíos
    //print_r($data);
    return view('trakt/list', $data);
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
       // print_r($response);
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

    public function buscarPelicula()
{
    // Obtener el título de la película desde la solicitud POST
    $titulo = $this->request->getPost('titulo');

    // Realizar la solicitud de búsqueda a la API de Trakt
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://private-anon-3f1a48b678-trakt.apiary-proxy.com/search?type=movie&query=" . urlencode($titulo));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);

    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Content-Type: application/json",
        "trakt-api-version: 2",
        "trakt-api-key: 52724ba78d1d787ef10c7580921676b1cb1ee71fe6ffc10c6f9d68b404d8c19a"
    ));

    $response = curl_exec($ch);
    curl_close($ch);

    // Decodificar la respuesta JSON de búsqueda
    $results = json_decode($response);

    // Obtener las películas recomendadas
    $recommendations = $this->getRecommendedMovies();

    // Pasar los resultados de búsqueda y las películas recomendadas a la vista
    $data['results'] = $results;
    $data['recommendations'] = $recommendations;
    //print_r($data['results']);
    // Cargar la vista para mostrar los resultados de búsqueda y las películas recomendadas
    echo view('trakt/list', $data);
}
    
    
}
