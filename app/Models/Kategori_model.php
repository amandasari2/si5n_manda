<?php

namespace App\Models;

use CodeIgniter\Model;

class Kategori_model extends Model{
        public function tampil(){
                return $this->db->table('tbl_kategori')->get()->getResultArray();
        }

        public function simpan($data){
                return $this->db->table('tbl_kategori')->insert($data);
        }

        public function edit ($data){
                return $this->db->table('tbl_kategori')->where('id_kategori', $data['id_kategori'])->update($data);
        }

        public function hapus ($data){
                return $this->db->table('tbl_kategori')->where('id_kategori', $data['id_kategori'])->delete($data);
        }
}