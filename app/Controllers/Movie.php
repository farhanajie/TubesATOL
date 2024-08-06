<?php

namespace App\Controllers;

use App\Models\MovieModel;

class Movie extends BaseController
{
    protected $movie_model;

    public function __construct()
    {
        $this->movie_model = new MovieModel();
    }

    public function index()
    {
        $popular = $this->movie_model->getPopular();
        $upcoming = $this->movie_model->getUpcoming();
        $data = [
            'popular' => $popular,
            'upcoming' => $upcoming,
        ];
        return view('home', $data);
    }

    public function movie($id)
    {
        list($movie, $credits) = $this->movie_model->getMovie($id);
        $data = [
            'movie' => $movie,
            'credits' => $credits,
        ];
        return view('movie/movie', $data);
    }

    public function person($id)
    {
        list($person, $movies) = $this->movie_model->getPerson($id);
        $data = [
            'person' => $person,
            'movies' => $movies,
        ];
        return view('movie/person', $data);
    }

}