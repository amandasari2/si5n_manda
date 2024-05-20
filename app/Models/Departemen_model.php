<?php

namespace App\Models;

use CodeIgniter\Model;

class Departemen_model extends Model{
        public function tampil(){
                return $this->db->table('tbl_departemen')->get()->getResultArray();
        }

        public function simpan($data){
                return $this->db->table('tbl_departemen')->insert($data);
        }

        public function edit ($data){
                return $this->db->table('tbl_departemen')->where('id_departemen', $data['id_departemen'])->update($data);
        }

        public function hapus ($data){
                return $this->db->table('tbl_departemen')->where('id_departemen', $data['id_departemen'])->delete($data);
        }
}