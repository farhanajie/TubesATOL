<?php

namespace App\Models;

use CodeIgniter\Model;

class MovieModel extends Model
{
    protected $endpoint = 'https://api.themoviedb.org/3';
    protected $api_key = 'b3c0943f99985e1589662b2e5aea2200';

    protected function tmdbGet($url)
    {
        $url = $url . '?api_key=' . $this->api_key . '&region=ID';
        $res = file_get_contents($url);
        return json_decode($res);
    }

    public function getPopular()
    {
        $url = $this->endpoint . '/movie/popular';
        return $this->tmdbGet($url);
    }

    public function getUpcoming()
    {
        $url = $this->endpoint . '/movie/upcoming';
        return $this->tmdbGet($url);
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
