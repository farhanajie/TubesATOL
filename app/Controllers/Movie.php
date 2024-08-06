<?php

namespace App\Controllers;

use App\Models\MovieModel;
use App\Models\FavoriteModel;

class Movie extends BaseController
{
    protected $movie_model;
    protected $favorite_model;

    public function __construct()
    {
        $this->movie_model = new MovieModel();
        $this->favorite_model = new FavoriteModel();
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

    public function search()
    {
        $keyword = $this->request->getPost('query');
        $movies = $this->movie_model->searchMovies($keyword);
        $data = [
            'movies' => $movies
        ];
        return view('movie/search', $data);
    }

    public function movie($id)
    {
        list($movie, $credits) = $this->movie_model->getMovie($id);
        $favorites = $this->favorite_model->where([
            'user_id' => session()->get('id'),
        ])->get()->getResult();

        $is_favorite = false;
        foreach($favorites as $favorite) {
            if($favorite->movie_id == $id) {
                $is_favorite = true;
                break;
            }
        } 
        $data = [
            'movie' => $movie,
            'credits' => $credits,
            'is_favorite' => $is_favorite,
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