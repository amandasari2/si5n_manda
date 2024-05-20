<?php

namespace App\Controllers;

use App\Models\Auth_model;

class Auth extends BaseController
{
    public function __construct()
    {
        $this->Auth_model = new Auth_model();
        helper('form');
    }

    public function index()
    {
        $data = array(
            'judul'     => 'Login',
        );
        return view('v_login', $data);
    }

    public function login()
    {
        if ($this->validate([
            'username' => [
                'label' => 'Username',
                'rules'    => 'required',
                'errors'   => [
                    'required' => '{field} Wajib Diisi!!'
                ]
            ],

            'password' => [
                'label' => 'Password',
                'rules'    => 'required',
                'errors'   => [
                    'required' => '{field} Wajib Diisi!!'
                ]
            ],
        ])) {
            //Jika Login Valid
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $cek      = $this->Auth_model->login($username, $password);
            if ($cek) {
                //Jika Datanya Cocok
                session()->set('log', true);
                session()->set('nama_user', $cek['nama_user']);
                session()->set('username', $cek['username']);
                session()->set('level', $cek['level']);
                session()->set('foto', $cek['foto']);
                session()->set('id_departemen', $cek['id_departemen']);
                session()->set('id_user', $cek['id_user']);
                return redirect()->to(base_url('home'));
            } else {
                session()->setFlashdata('pesan', 'Username atau Password Anda Salah!');
                return redirect()->to(base_url('auth/index'));
            }
        } else {
            //Jika Data Tidak Valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('auth/index'));
        }
    }

    public function logout()
    {
        session()->remove('log');
        session()->remove('nama_user');
        session()->remove('username');
        session()->remove('level');
        session()->remove('foto');

        session()->setFlashdata('pesan', 'Anda Berhasil Log Out!');
        return redirect()->to(base_url('auth/index'));
    }
}
