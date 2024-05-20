<?php

namespace App\Controllers;

use App\Models\Arsip_model;
use App\Models\Kategori_model;


class Arsip extends BaseController
{

        public function __construct()
        {
                $this->Arsip_model = new Arsip_model();
                $this->Kategori_model = new Kategori_model();
                helper('form');
        }

        public function index()
        {
                $data = array(
                        'judul'     => 'ARSIP',
                        'arsip'  => $this->Arsip_model->tampil(),
                        'page'      => 'v_arsip'
                );
                return view('layout/v_gabung', $data);
        }

        public function tambah()
        {
                $data = array(
                        'judul'     => 'Tambah File Arsip',
                        'kategori'  => $this->Kategori_model->tampil(),
                        'page'      => 'v_addarsip'
                );
                return view('layout/v_gabung', $data);
        }

        public function tambahdata()
        {
                //Validasi Data
                if ($this->validate([
                        'nama_arsip' => [
                                'label' => 'Nama Arsip',
                                'rules' => 'required',
                                'errors' => [
                                        'required' => '{field} Wajib Di Isi!!'
                                ]
                        ],
                        'id_kategori' => [
                                'label' => 'Kategori',
                                'rules' => 'required',
                                'errors' => [
                                        'required' => '{field} Wajib Di Isi!!'
                                ]
                        ],
                        'file_arsip' => [
                                'label' => 'File Arsip',
                                'rules' => 'uploaded[file_arsip]|max_size[file_arsip,2048]|ext_in[file_arsip,pdf]',
                                'errors' => [
                                        'uploaded' => '{field} Wajib Di Isi!!',
                                        'max_size' => 'Ukuran {field} Maksimal 2048 KB!!',
                                        'mime_in' => 'Format {field} pdf!!'
                                ]
                        ],

                ])) {
                        //Mengambil File Yang Akan DI Upload
                        $file_arsip = $this->request->getFile('file_arsip');
                        //Merandom Nama File
                        $nama_file = $file_arsip->getRandomName();
                        //Jika Data Valid
                        $data = array(
                                'id_kategori' => $this->request->getPost('id_kategori'),
                                'no_arsip' => $this->request->getPost('no_arsip'),
                                'nama_arsip' => $this->request->getPost('nama_arsip'),
                                'tgl_upload' => date('Y-m-d'),
                                'tgl_update' => date('Y-m-d'),
                                'id_departemen' => session()->get('id_departemen'),
                                'id_user' => session()->get('id_user'),
                                'file_arsip' => $nama_file
                        );
                        $file_arsip->move('file_arsip', $nama_file);
                        $this->Arsip_model->simpan($data);
                        session()->setFlashdata('pesan', 'Data Berhasil Di Tambah!!');
                        return redirect()->to(base_url('arsip'));
                } else {
                        //Jika Data Tidak Valid
                        session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
                        return redirect()->to(base_url('arsip/tambah'));
                }
        }

        public function viewpdf($id_arsip){
                $data = array(
                        'judul'     => 'View Arsip',
                        'arsip'  => $this->Arsip_model->detail($id_arsip),
                        'page'      => 'v_viewarsip'
                );
                return view('layout/v_gabung', $data);
        }

        public function edit($id_arsip)
        {
            $data = array(
                'judul'      => 'Update Arsip',
                'kategori'   => $this->Kategori_model->tampil(),
                'arsip'      => $this->Arsip_model->detail($id_arsip),
                'page'       => 'v_editarsip'
            );
            return view('layout/v_gabung', $data);
        }

        public function editdata($id_arsip)
        {
                //Validasi Data
                if ($this->validate([
                        'nama_arsip' => [
                                'label' => 'Nama Arsip',
                                'rules' => 'required',
                                'errors' => [
                                        'required' => '{field} Wajib Di Isi!!'
                                ]
                        ],
                        'id_kategori' => [
                                'label' => 'Kategori',
                                'rules' => 'required',
                                'errors' => [
                                        'required' => '{field} Wajib Di Isi!!'
                                ]
                        ],
                        'file_arsip' => [
                                'label' => 'File Arsip',
                                'rules' => 'max_size[file_arsip,2048]|ext_in[file_arsip,pdf]',
                                'errors' => [
                                        
                                        'max_size' => 'Ukuran {field} Maksimal 2048 KB!!',
                                        'mime_in' => 'Format {field} pdf!!'
                                ]
                        ],

                ])) {
                        //Mengambil File Yang Akan DI Upload
                        $file_arsip = $this->request->getFile('file_arsip');

                        if($file_arsip->getError() == 4){
                                $data = array(
                                        'id_arsip' => $id_arsip,
                                        'id_kategori' => $this->request->getPost('id_kategori'),
                                        'no_arsip' => $this->request->getPost('no_arsip'),
                                        'nama_arsip' => $this->request->getPost('nama_arsip'),
                                        'tgl_upload' => date('Y-m-d'),
                                        'tgl_update' => date('Y-m-d'),
                                        'id_departemen' => session()->get('id_departemen'),
                                        'id_user' => session()->get('id_user'),
                                );
                                $this->Arsip_model->edit($data);
                        }else{
                                //Menghapus File Lama
                                $arsip = $this->Arsip_model->detail($id_arsip);
                                if ($arsip['file_arsip'] != ""){
                                        unlink('file_arsip/' .$arsip['file_arsip']);
                                }
                      

                        //Merandom File Arsip
                        $nama_file = $file_arsip->getRandomName();
                        //Jika Data Valid
                        $data = array(
                                'id_arsip' => $id_arsip,
                                'id_kategori' => $this->request->getPost('id_kategori'),
                                'no_arsip' => $this->request->getPost('no_arsip'),
                                'nama_arsip' => $this->request->getPost('nama_arsip'),
                                'tgl_upload' => date('Y-m-d'),
                                'tgl_update' => date('Y-m-d'),
                                'id_departemen' => session()->get('id_departemen'),
                                'id_user' => session()->get('id_user'),
                                'file_arsip' => $nama_file
                        );
                        $file_arsip->move('file_arsip', $nama_file);
                        $this->Arsip_model->edit($data);
                }
                        session()->setFlashdata('pesan', 'Data Berhasil Di Edit!!');
                        return redirect()->to(base_url('arsip'));
                } else {
                        //Jika Data Tidak Valid
                        session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
                        return redirect()->to(base_url('arsip/edit/'.$id_arsip));
                }
        }

        public function hapus($id_arsip)
        {
                $data = array(
                        'id_arsip'   => $id_arsip
                );
                $this->Arsip_model->hapus($data);
                session()->setFlashdata('pesan', 'Data Berhasil Di Hapus!');
                return redirect()->to(base_url('arsip'));
        }

}
