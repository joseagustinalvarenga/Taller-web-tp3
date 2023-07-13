<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Config\Trakt;

class TraktController extends Controller
{
    public function index()
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://private-anon-e2f01fae6a-trakt.apiary-proxy.com/movies/trending");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json",
            "trakt-api-version: 2",
            "trakt-api-key: 52724ba78d1d787ef10c7580921676b1cb1ee71fe6ffc10c6f9d68b404d8c19a" // Reemplaza TU_CLIENT_ID con tu API key de Trakt
        ));

        $response = curl_exec($ch);
        curl_close($ch);

        //var_dump($response);

        // Decodifica la respuesta JSON
        $movies = json_decode($response);

        // Verificar si $movies es un array o un objeto válido
        if (is_array($movies) || is_object($movies)) {
            // Pasar los datos a la vista para mostrar el listado de películas
            $data = [
                'movies' => $movies
            ];

            return view('trakt/list', $data);
        } else {
            // Mostrar un mensaje de error o redireccionar a una página de error
            echo "Error al obtener el listado de películas recomendadas";
        }
    }

    private function getRecommendedMovies()
    {
        $apiKey = "52724ba78d1d787ef10c7580921676b1cb1ee71fe6ffc10c6f9d68b404d8c19a";
        $url = "https://private-anon-e2f01fae6a-trakt.apiary-proxy.com/movies/trending";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json",
            "trakt-api-version: 2",
            "trakt-api-key: " . $apiKey
        ));

        $response = curl_exec($ch);
        curl_close($ch);

        return json_decode($response);
    }

    public function verComentarios($traktId)
    {
        $apiKey = "52724ba78d1d787ef10c7580921676b1cb1ee71fe6ffc10c6f9d68b404d8c19a";
        $url = "https://private-anon-e2f01fae6a-trakt.apiary-proxy.com/movies/" . $traktId . "/comments/highest";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json",
            "trakt-api-version: 2",
            "trakt-api-key: " . $apiKey
        ));

        $response = curl_exec($ch);
        curl_close($ch);

        $comments = json_decode($response);
        //print_r($comments);
        // Manipular los comentarios según tus necesidades

        return view('trakt/comments', ['comments' => $comments]);
    }
}
