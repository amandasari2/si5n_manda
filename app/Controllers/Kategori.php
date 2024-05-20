<?php

namespace App\Controllers;

use App\Models\Kategori_model;

class Kategori extends BaseController
{

    public function __construct()
    {
        $this->Kategori_model = new Kategori_model();
        helper('form');
    }

    public function index(){
        $data = array(
            'judul'     => 'Kategori',
            'kategori'  => $this->Kategori_model->tampil(),
            'page'      => 'v_kategori'
        );
        return view('layout/v_gabung', $data);
    }

    public function tambah(){
        $data = array(
                'nama_kategori' => $this->request->getPost('nama_kategori')
        );
        $this->Kategori_model->simpan($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !');
        return redirect()->to(base_url('kategori'));
    }

    public function edit($id_kategori){
        $data = array(
            'id_kategori'   => $id_kategori,
            'nama_kategori' => $this->request->getPost('nama_kategori')
    );
        $this->Kategori_model->edit($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diubah !');
        return redirect()->to(base_url('kategori'));
    }

    public function hapus($id_kategori){
        $data = array(
            'id_kategori'   => $id_kategori
    );
        $this->Kategori_model->hapus($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus !');
        return redirect()->to(base_url('kategori'));
    }
}
