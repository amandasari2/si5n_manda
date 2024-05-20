<?php

namespace App\Controllers;

use App\Models\M_user;
use App\Models\Departemen_model;

class User extends BaseController
{

    public function __construct()
    {
        $this->M_user = new M_user();
        $this->Departemen_model = new Departemen_model();
        helper('form');
    }

    public function index()
    {
        $data = array(
            'judul'     => 'Kategori',
            'user'  => $this->M_user->tampil(),
            'page'      => 'v_user'
        );
        return view('layout/v_gabung', $data);
    }

    public function tambah()
    {
        $data = array(
            'judul'     => 'Tambah User',
            'departemen'  => $this->Departemen_model->tampil(),
            'page'      => 'v_adduser'
        );
        return view('layout/v_gabung', $data);
    }

    public function edit($id_user)
    {
        $data = array(
            'judul'      => 'Update User',
            'departemen' => $this->Departemen_model->tampil(),
            'user'       => $this->M_user->detail($id_user),
            'page'       => 'v_edituser'
        );
        return view('layout/v_gabung', $data);
    }

    public function tambahdata()
    {
        //Validasi Data
        if ($this->validate([
            'nama_user' => [
                'label' => 'Nama User',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Di Isi!!'
                ]
            ],
            'username' => [
                'label' => 'Username',
                'rules' => 'required|is_unique[tbl_user.username]',
                'errors' => [
                    'required' => '{field} Wajib Di Isi!!',
                    'is_unique' => '{field} Sudah Ada, Input {field} Lain'
                ]

            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Di Isi!!'
                ]
            ],
            'foto' => [
                'label' => 'Foto',
                'rules' => 'uploaded[foto]|max_size[foto,1024]|mime_in[foto,image/png,image/jpeg,image/jpg]',
                'errors' => [
                    'uploaded' => '{field} Wajib Di Isi!!',
                    'max_size' => 'Ukuran {field} Maksimal 1024 KB!!',
                    'mime_in' => 'Format {field} Wajib PNG, JPEG, JPG!!'
                ]
            ],

        ])) {
            //Mengambil File Foto Yang Akan DI Upload
            $foto = $this->request->getFile('foto');
            //Merandom Nama File Foto
            $nama_file = $foto->getRandomName();
            //Jika Data Valid
            $data = array(
                'nama_user' => $this->request->getPost('nama_user'),
                'username' => $this->request->getPost('username'),
                'password' => $this->request->getPost('password'),
                'level' => $this->request->getPost('level'),
                'id_departemen' => $this->request->getPost('id_departemen'),
                'foto' => $nama_file
            );
            $foto->move('foto', $nama_file);
            $this->M_user->simpan($data);
            session()->setFlashdata('pesan', 'Data Berhasil Di Tambah!!');
            return redirect()->to(base_url('user'));
        } else {
            //Jika Data Tidak Valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('user/tambah'));
        }
    }

    public function editdata($id_user)
    {
        //Validasi Data
        if ($this->validate([
            'nama_user' => [
                'label' => 'Nama User',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Di Isi!!'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Di Isi!!'
                ]
            ],
            'foto' => [
                'label' => 'Foto',
                'rules' => 'max_size[foto,1024]|mime_in[foto,image/png,image/jpeg,image/jpg]',
                'errors' => [
                    'max_size' => 'Ukuran {field} Maksimal 1024 KB!!',
                    'mime_in' => 'Format {field} Wajib PNG, JPEG, JPG!!'
                ]
            ],

        ])) {

            $foto = $this->request->getFile('foto');
            if ($foto->getError() == 4) {
                $data = array(
                    'id_user' => $id_user,
                    'nama_user' => $this->request->getPost('nama_user'),
                    'password' => $this->request->getPost('password'),
                    'level' => $this->request->getPost('level'),
                    'id_departemen' => $this->request->getPost('id_departemen'),
                );
                $this->M_user->edit($data);
            } else {
                //Menghapus Foto Lama
                $user = $this->M_user->detail($id_user);
                if ($user['foto'] != "") {
                    unlink('foto/' . $user['foto']);
                }
            
            //Merandom Nama File Foto
            $nama_file = $foto->getRandomName();
            //Jika Data Valid
            $data = array(
                'id_user' => $id_user,
                'nama_user' => $this->request->getPost('nama_user'),
                'password' => $this->request->getPost('password'),
                'level' => $this->request->getPost('level'),
                'id_departemen' => $this->request->getPost('id_departemen'),
                'foto' => $nama_file
            );
            $foto->move('foto', $nama_file);
            $this->M_user->edit($data);
        }
            session()->setFlashdata('pesan', 'Data Berhasil Di Ubah!!');
            return redirect()->to(base_url('user'));
        } else {
            //Jika Data Tidak Valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('user/edit/'.$id_user));
        }
    }

    public function hapus($id_user)
    {
        $data = array(
            'id_user'   => $id_user
        );
        $this->M_user->hapus($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus !');
        return redirect()->to(base_url('user'));
    }
}
