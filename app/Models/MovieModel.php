<?php

namespace App\Models;

use CodeIgniter\Model;

class MovieModel extends Model
{
    protected $endpoint = 'https://api.themoviedb.org/3';
    protected $api_key = 'b3c0943f99985e1589662b2e5aea2200';

    protected function tmdbGet($url, $params = [])
    {
        $url = $url . '?' . http_build_query(array_merge($params, ['api_key' => $this->api_key]));
        $res = file_get_contents($url);
        return json_decode($res);
    }

    public function getGenres()
    {
        $url = $this->endpoint . '/genre/movie/list';
        return $this->tmdbGet($url);
    }

    public function getPopular()
    {
        $url = $this->endpoint . '/movie/popular';
        return $this->tmdbGet($url, ['region' => 'ID']);
    }

    public function getUpcoming()
    {
        $url = $this->endpoint . '/movie/upcoming';
        return $this->tmdbGet($url, ['region' => 'ID']);
    }
    
    public function searchMovies($keyword)
    {
        $url = $this->endpoint . '/search/movie';
        return $this->tmdbGet($url, ['query' => $keyword]);
    }

    public function getMovie($id)
    {
        $url_movie = $this->endpoint . '/movie/' . $id;
        $url_credits = $this->endpoint . '/movie/' . $id . '/credits';
        return array($this->tmdbGet($url_movie), $this->tmdbGet($url_credits));
    }

    public function getPerson($id)
    {
        $url_person = $this->endpoint . '/person/' . $id;
        $url_movies = $this->endpoint . '/person/' . $id . '/movie_credits';
        return array($this->tmdbGet($url_person), $this->tmdbGet($url_movies));
    }
}
