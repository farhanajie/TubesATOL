<?php

namespace App\Controllers;

use App\Models\FavoriteModel;
use App\Models\MovieModel;

class Favorite extends BaseController
{
    protected $favorite_model;
    protected $movie_model;

    public function __construct()
    {
        $this->favorite_model = new FavoriteModel();
        $this->movie_model = new MovieModel();
    }

    public function cekLogin()
    {
        return (session()->get('logged_in')) ? true : false;
    }

    public function index()
    {
        if ($this->cekLogin()) {
            $data['favorites'] = [];
            $favorites = $this->favorite_model->where([
                'user_id' => session()->get('id'),
            ])->get()->getResult();

            foreach ($favorites as $favorite) {
                list($movie, $credits) = $this->movie_model->getMovie($favorite->movie_id);
                array_push($data['favorites'], $movie);
            }
            return view('user/favorite', $data);
        }
        else return redirect()->to('login');
    }

    public function favButton()
    {
        $data = [
            'user_id' => session()->get('id'),
            'movie_id' => $this->request->getPost('movie_id'),
        ];

        $check = $this->favorite_model->where([
            'user_id' => $data['user_id'],
            'movie_id' => $data['movie_id'],
        ])->first();

        if (!$check) {
            $insert = $this->favorite_model->insert($data);
            if ($insert) {
            }
        } else {
            $this->deleteFavorite($check->id);
        }

        return redirect()->to(base_url('movie/' . $data['movie_id']));
    }

    public function deleteFavorite($id)
    {
        $delete = $this->favorite_model->delete($id);
    }
}
