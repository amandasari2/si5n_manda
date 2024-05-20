<?php

namespace App\Controllers;

use App\Models\Departemen_model;

class Departemen extends BaseController
{

    public function __construct()
    {
        $this->Departemen_model = new Departemen_model();
        helper('form');
    }

    public function index()
    {
        $data = array(
            'judul'     => 'Departemen',
            'departemen'  => $this->Departemen_model->tampil(),
            'page'      => 'v_departemen'
        );
        return view('layout/v_gabung', $data);
    }

    public function tambah()
    {
        $data = array(
            'nama_departemen' => $this->request->getPost('nama_departemen')
        );
        $this->Departemen_model->simpan($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !');
        return redirect()->to(base_url('departemen'));
    }

    public function edit($id_departemen)
    {
        $data = array(
            'id_departemen'   => $id_departemen,
            'nama_departemen' => $this->request->getPost('nama_departemen')
        );
        $this->Departemen_model->edit($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diubah !');
        return redirect()->to(base_url('departemen'));
    }

    public function hapus($id_departemen)
    {
        $data = array(
            'id_departemen'   => $id_departemen
        );
        $this->Departemen_model->hapus($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus!');
        return redirect()->to(base_url('departemen'));
    }
}
