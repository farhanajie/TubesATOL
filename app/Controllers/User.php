<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    protected $user_model;
    protected $helpers = [];
    public function __construct()
    {
        helper(['form']);
        $this->user_model = new UserModel();
    }

    public function cekLogin()
    {
        return (session()->get('logged_in')) ? true : false;
    }

    public function register()
    {
        return ($this->cekLogin()) ? redirect()->back() : view('user/register');
    }

    public function register_process()
    {
        $validation = \Config\Services::validation();
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'pass_confirm' => $this->request->getPost('pass_confirm'),
        ];

        if ($validation->run($data, 'register') == false) {
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->back()->withInput();
        } else {
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
            unset($data['pass_confirm']);
            $insert = $this->user_model->insert($data);
            if ($insert) {
                session()->setFlashdata('success', 'Registrasi berhasil');
                return redirect()->to(base_url('login'));
            }
        }
    }

    public function login()
    {
        return ($this->cekLogin()) ? redirect()->back() : view('user/login');
    }

    public function login_process()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $check = $this->user_model->where([
            'username' => $username,
        ])->first();

        if ($check) {
            if (password_verify($password, $check->password)) {
                session()->set([
                    'id' => $check->id,
                    'username' => $check->username,
                    'logged_in' => TRUE
                ]);
                return redirect()->to(base_url());
            } else {
                session()->setFlashdata('errors', ['Username/password salah']);
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('errors', ['Username/password salah']);
            return redirect()->back();
        }
    }

    public function profile()
    {
        $data['user'] = $this->user_model->getUser(session()->username);
        echo view('user/profile', $data);
    }
    public function update()
    {
        $username = $this->request->getPost('username');

     
            $image = $this->request->getFile('photo');
            // random name file
            $name = $image->getRandomName();
          
        
       

        $data = array(
            'photo'              => $name,
            'nama'               => $this->request->getPost('nama'),
        );
        
        $image->move(ROOTPATH . 'public/uploads', $name);
           
            // update
            $ubah = $this->user_model->updateProfile($data, $username);
            if($ubah)
            {
                session()->setFlashdata('info', 'Updated Product successfully');
                return redirect()->to(base_url('/profile')); 
            }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url());
    }
}
