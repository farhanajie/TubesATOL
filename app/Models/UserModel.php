<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $returnType = "object";
    protected $allowedFields = ['username', 'password', 'photo', 'nama'];

    
    public function getUser($username = false)
    {
        if($username === false){
            return $this->table('user')
                        ->get()
                        ->getResultArray();
        } else {
            return $this->table('user')
                        ->where('username', $username)
                        ->get()
                        ->getRowArray();
        }
    }
    
    public function updateProfile($data, $username)
    {
        return $this->db->table($this->table)->where(['username'=>$username])->set($data)->update();
    }
}
