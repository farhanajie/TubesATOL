<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    protected $user_model;

    public function __construct()
    {
        helper('form');
        $this->user_model = new UserModel();
    }

    public function register()
    {
        return view('user/register');
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
        return view('user/login');
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
                    'username' => $check->username,
                    'logged_in' => TRUE
                ]);
                return redirect()->to(base_url('/'));
            } else {
                session()->setFlashdata('errors', ['Username/password salah']);
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('errors', ['Username/password salah']);
            return redirect()->back();
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('login');
    }
}
