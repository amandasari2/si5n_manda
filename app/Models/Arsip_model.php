<?php

namespace App\Models;

use CodeIgniter\Model;

class Arsip_model extends Model{
        public function tampil(){
                return $this->db->table('tbl_arsip')
                ->join('tbl_departemen', 'tbl_departemen.id_departemen = tbl_arsip.id_departemen', 'left')
                ->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_arsip.id_kategori','left')
                ->join('tbl_user', 'tbl_user.id_user = tbl_arsip.id_user','left')
                ->orderBy('id_arsip', 'desc')->get()->getResultArray();
        }

        public function simpan($data){
                return $this->db->table('tbl_arsip')->insert($data);
        }

        public function edit($data){
                return $this->db->table('tbl_arsip')->where('id_arsip', $data['id_arsip'])->update($data);
        }

        public function detail($id_arsip){
                return $this->db->table('tbl_arsip')
                ->join('tbl_departemen', 'tbl_departemen.id_departemen = tbl_arsip.id_departemen', 'left')
                ->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_arsip.id_kategori','left')
                ->join('tbl_user', 'tbl_user.id_user = tbl_arsip.id_user','left')
                ->where('id_arsip', $id_arsip)->get()->getRowArray();
        }

        public function hapus ($data){
                return $this->db->table('tbl_arsip')->where('id_arsip', $data['id_arsip'])->delete($data);
        }
}