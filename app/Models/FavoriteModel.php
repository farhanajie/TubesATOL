<?php

namespace App\Models;

use CodeIgniter\Model;

class FavoriteModel extends Model
{
    protected $table = 'favorites';
    protected $primaryKey = 'id';
    protected $returnType = "object";
    protected $allowedFields = ['user_id', 'movie_id'];
}